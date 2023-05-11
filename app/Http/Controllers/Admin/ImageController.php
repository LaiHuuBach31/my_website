<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreRequest;
use App\Http\Requests\Image\UpdateRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('image-index')) {
            abort(403);
        }
        $images = Image::orderby('id', 'DESC')->paginate(5);
        return view('admin.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('image-add')) {
            abort(403);
        }
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.image.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreRequest $req)
    {
        try {
            $form_images = $request->uploads;
            foreach ($form_images as $key => $value) {
                $file_name = $request->uploads[$key]->getClientOriginalName();
                $request->uploads[$key]->move(public_path('uploads'), $file_name);
                $form_images['value'] = $file_name;
                Image::create([
                    "value" => $file_name,
                    "product_id" => $request->product_id
                ]);
            }
            return redirect()->route('image.index')->with('yes', 'Create Successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Create Failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        if (!Gate::allows('image-edit', $image)) {
            abort(403);
        }
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.image.edit', compact('image', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image, UpdateRequest $req)
    {

        try {
            $form_images = $request->uploads;
            foreach ($form_images as $key => $value) {
                $file_name = $request->uploads[$key]->getClientOriginalName();
                $request->uploads[$key]->move(public_path('uploads'), $file_name);
                $form_images['value'] = $file_name;
                $image->update([
                    "value" => $file_name,
                    "product_id" => $request->product_id,
                ]);
            }

            return redirect()->route('image.index')->with('yes', 'Update Successful');

        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        if (!Gate::allows('image-delete', $image)) {
            abort(403);
        }
        try {
            $image->delete();
            return redirect()->route('image.index')->with('yes', 'Delete successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Failed successful');
        }
    }
}
