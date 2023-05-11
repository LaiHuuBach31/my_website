<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('category-index')) {

            abort(403);
        }

        $categories = Category::orderby('id', 'DESC')->paginate(5);
        if ($request) {
            $categories = Category::where('name', 'like', '%' . $request->keyword . '%')->orderby('id', 'DESC')->paginate(5);
        }
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('category-add')) {

            abort(403);
        }
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreRequest $req)
    {
        try {
            $form_data = $request->all();
            Category::create($form_data);
            return redirect()->route('category.index')->with('yes', 'Add new successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'New add failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        if (!Gate::allows('category-edit', $category)) {

            abort(403);
        }
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, UpdateRequest $req)
    {
        try {
            $form_data = $request->all();
            $category->update($form_data);
            return redirect()->route('category.index')->with('yes', 'Update Successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!Gate::allows('category-delete', $category)) {

            abort(403);
        }
        try {
            $count = Product::where('category_id', $category->id)->count();
            if ($count > 0) {
                $message = 'Are you sure you want to delete this category and also the products in this category ?';
                if ( config($message)) {
                    $products = Product::where('category_id', $category->id)->get();
                    foreach ($products as $value) {
                        $value->delete();
                    }
                    $category->delete();
                    return redirect()->route('category.index')->with('yes', 'Delete Successful');
                } else {
                    return redirect()->back()->with('no', 'Delete Failed, Existing catalog products');
                }
            }
            $category->delete();
            return redirect()->route('category.index')->with('yes', 'Delete Successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Delete Failed');
        }
    }
}
