<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Recursion as HelperRecursion;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Helper\Recursion;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('permission-index')) {
            abort(403);
        }
        if ($request) {
            $permissions = Permission::where('name', 'like', '%' . $request->keyword . '%')->orderby('id', 'DESC')->paginate(5);
        }
        $permissions = Permission::paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        if (!Gate::allows('permission-add')) {
            abort(403);
        }
        $data = Permission::all();
        $recursion = new Recursion($data);
        $htmlOption = $recursion->permissRecursion('');

        return view('admin.permission.create', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        try {

            if($request->module_parent) {
                Permission::create([
                    "name" => $request->name,
                    "parent_id" => $request->parent_id,
                    'key_code' => $request->module_parent. '_' .$request->module_children
                ]);
            } else {
                Permission::create([
                    "name" => $request->name,
                    "parent_id" => $request->parent_id,
                ]);
            }

            return redirect()->route('permission.index')->with('yes', 'Add new Successful');
        } catch (\Throwable $th) {

            return redirect()->back()->with('no', 'Add new Failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        if (!Gate::allows('permission-edit', $permission)) {
            abort(403);
        }
        $data = Permission::all();
        $recursion = new Recursion($data);
        $htmlOption = $recursion->permissRecursion($permission->parent_id);
        return view('admin.permission.edit', compact('htmlOption', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
       
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        if (!Gate::allows('permission-delete', $permission)) {
            abort(403);
        }

        try {

            $permission->delete();
            return redirect()->route('permission.index')->with('yes', 'Delete Successful');
        } catch (\Throwable $th) {

            return redirect()->back()->with('no', 'Delete Failed');
        }
    }

    public function addPermiss()
    {
        return view('admin.permission.add');
    }
    public function storePermiss(Request $request)
    {
        dd($request->all());
    }
}
