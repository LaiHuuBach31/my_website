<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermiss;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('role-index')) {
            abort(403);
        }
        if($request){
            $roles = Role::where('name', 'like', '%'.$request->keyword.'%')->orderby('id', 'DESC')->paginate(5);
        }
        $roles = Role::orderby('id', 'ASC')->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('role-add')) {
            abort(403);
        }
        $permissionParent = Permission::where('parent_id', 0)->get();
        return view('admin.role.create', compact('permissionParent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $role = Role::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            $role_permisses = $request->permiss_id;
            foreach ($role_permisses as $value) {
                RolePermiss::create([
                    'role_id' => $role->id,
                    'permiss_id' => $value,
                ]);
            }
            DB::commit();
            return redirect()->route('role.index')->with('yes', 'Add new successful');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('no', 'New add failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        if (!Gate::allows('role-edit', $role)) {
            abort(403);
        }
        $permissionParent = Permission::where('parent_id', 0)->get();
        $role_permisses = $role->role_permission;
        return view('admin.role.edit', compact('permissionParent', 'role', 'role_permisses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        try {
            DB::beginTransaction();
            $role_permisses = RolePermiss::where('role_id', $role->id)->get();
            foreach ($role_permisses as $value) {
                $value->delete();
            }

            $role->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            $role_permisses = $request->permiss_id;
            foreach ($role_permisses as $value) {
                RolePermiss::create([
                    'role_id' => $role->id,
                    'permiss_id' => $value,
                ]);
            }
            DB::commit();
            return redirect()->route('role.index')->with('yes', 'Update successful');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('no', 'Update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if (!Gate::allows('role-delete', $role)) {
            abort(403);
        }
        try {
            $role->delete();
            return redirect()->route('user.index')->with('yes', 'Delete Successful');
        } catch (\Throwable $th) {  
            return redirect()->back()->with('no', 'Delete Failed');
        }
    }
}
