<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\StoreRequest;
use App\Http\Requests\Attribute\UpdateRequest;
use App\Models\Attribute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('attribute-index')) {
            abort(403);
        }
        $attributes = Attribute::orderby('id', 'DESC')->paginate(5);
        if($request){
            $attributes = Attribute::where('name', 'like', '%'.$request->keyword.'%')->orderby('id', 'DESC')->paginate(5);
        };
        return view('admin.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('attribute-add')) {
            abort(403);
        }
        return view('admin.attribute.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreRequest $req)
    {
        try {
            $form_data = $request->all();
            Attribute::create($form_data);
            return redirect()->route('attribute.index')->with('yes', 'Add new successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Add new failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
        // if (!Gate::allows('attribute-edit', $attribute)) {
        //     abort(403);
        // }
        return view('admin.attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attribute $attribute, UpdateRequest $req)
    {
        try {
            $form_data = $request->all();
            $attribute->update($form_data);
            return redirect()->route('attribute.index')->with('yes', 'Update successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        if (!Gate::allows('attribute-delete', $attribute)) {
            abort(403);
        }
        try {
            $attribute->delete();
            return redirect()->route('attribute.index')->with('yes', 'Delete successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Delete failed');
        }
    }
}
