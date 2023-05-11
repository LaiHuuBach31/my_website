<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Image;
use App\Models\ProAttr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (!Gate::allows('product-index')) {
            abort(403);
        }
        if ($request) {
            $products = Product::where('name', 'like', '%' . $request->keyword . '%')->orderby('id', 'DESC')->paginate(10);
        }
        $products = Product::where('user_id', Auth::user()->id)->orderby('id', 'DESC')->paginate(10);


        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('product-add')) {
            abort(403);
        }
        $categories = Category::all();
        $colors = Attribute::where('name', 'color')->get();
        $sizes = Attribute::where('name', 'size')->get();
        return view('admin.product.create', compact('categories', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreRequest $req)
    {

        try {
            $form_data = $request->only('name', 'price', 'category_id', 'status', 'description');
            $file_name = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('uploads'), $file_name);
            $form_data['image'] = $file_name;
            $form_data['user_id'] = Auth::user()->id;
            $product = Product::create($form_data);

            if ($request->attr_id) {
                $attr_ids = $request->attr_id;
                foreach ($attr_ids as $key => $value) {
                    ProAttr::create([
                        "pro_id" => $product->id,
                        "attr_id" => $value
                    ]);
                }
            }


            if ($request->uploads) {
                $form_images = $request->uploads;
                foreach ($form_images as $key => $value) {
                    $file_name = $request->uploads[$key]->getClientOriginalName();
                    $request->uploads[$key]->move(public_path('uploads'), $file_name);
                    $form_images['value'] = $file_name;
                    Image::create([
                        "value" => $file_name,
                        "product_id" => $product->id,
                    ]);
                }
            }

            return redirect()->route('product.index')->with('yes', 'Add new successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'New add failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (!Gate::allows('product-edit', $product)) {
            abort(403);
        }
        $categories = Category::all();
        $colors = Attribute::where('name', 'color')->get();
        $sizes = Attribute::where('name', 'size')->get();
        $images = Image::where('product_id', $product->id)->get();
        $attr_id = ProAttr::where('pro_id', $product->id)->pluck('attr_id')->toArray();
        return view('admin.product.edit', compact('categories', 'colors', 'sizes', 'product', 'images', 'attr_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, UpdateRequest $req)
    {

        try {
            $attrs = ProAttr::where('pro_id', $product->id)->get();
            foreach ($attrs as $key => $value) {
                $value->delete();
            }
            $images = Image::where('product_id', $product->id)->get();
            foreach ($images as $key => $value) {
                $value->delete();
            }
            $form_data = $request->only('name', 'price', 'sale_price', 'category_id', 'status', 'description');
            if ($request->has('upload')) {
                $file_name = $request->upload->getClientOriginalName();
                $request->upload->move(public_path('uploads'), $file_name);
                $form_data['image'] = $file_name;
                $form_data['user_id'] = Auth::user()->id;
                $product->update($form_data);
            }
            if ($request->attr_id) {
                $attr_ids = $request->attr_id;
                foreach ($attr_ids as $key => $value) {
                    ProAttr::create([
                        "pro_id" => $product->id,
                        "attr_id" => $value
                    ]);
                }
            }


            if ($request->uploads) {
                $form_images = $request->uploads;
                foreach ($form_images as $key => $value) {
                    $file_name = $request->uploads[$key]->getClientOriginalName();
                    $request->uploads[$key]->move(public_path('uploads'), $file_name);
                    $form_images['value'] = $file_name;
                    Image::create([
                        "value" => $file_name,
                        "product_id" => $product->id,
                    ]);
                }
            }
            return redirect()->route('product.index')->with('yes', 'Update Successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!Gate::allows('product-delete', $product)) {
            abort(403);
        }
        try {
            $images = Image::where('product_id', $product->id)->get();
            foreach ($images as $value) {
                $value->delete();
            }

            $attrs = ProAttr::where('pro_id', $product->id)->get();
            foreach ($attrs as $value) {
                $value->delete();
            }
            $product->delete();
            unlink(public_path('uploads/' . $product->image));
            return redirect()->route('product.index')->with('yes', 'Delete successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Delete failed');
        }
    }

    public function discount()
    {

        $products = Product::orderby('id', 'DESC')->paginate(10);


        return view('admin.product.discount', compact('products'));
    }

    public function calculate(Request $request)
    {

        try {
            $sale = $request->sale;
            $idPro = Str::of($request->list_product)->explode(',');

            foreach ($idPro as  $value) {
                $product = Product::find($value);
                $discount = ($product->price) - ($product->price * $sale / 100);
                $product->discount = $discount;
                $product->save();
            }

            return redirect()->route('product.discount')->with('yes', 'Successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Not Successful');
        }
    }
}
