<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if (!Gate::allows('user-index')) {
            abort(403);
        }
        if($request){
            $users = User::where('name', 'like', '%'.$request->keyword.'%')->orderby('id', 'DESC')->paginate(5);
        }
        $users = User::orderby('id', 'ASC')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('user-add')) {
            abort(403);
        }
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
            ]);

            $user_roles = $request->role_id;
            foreach ($user_roles as $value) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $value,
                ]);
            }
            DB::commit();
            return redirect()->route('user.index')->with('yes', 'Add new successful');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('no', 'New add failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (!Gate::allows('user-edit', $user)) {
            abort(403);
        }
        $roles = Role::all();
        $user_roles = $user->user_role;
        return view('admin.user.edit', compact('user', 'roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            DB::beginTransaction();
            $user_roles = UserRole::where('user_id', $user->id)->get();
            foreach ($user_roles as $value) {
                $value->delete();
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->name,
                'password' => $request->name,
            ]);

            $user_roles = $request->role_id;
            foreach ($user_roles as $value) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $value,
                ]);
            }
            DB::commit();
            return redirect()->route('user.index')->with('yes', 'Update successful');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('no', 'Update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!Gate::allows('user-delete', $user)) {
            abort(403);
        }
        try {
            $user->delete();
            return redirect()->route('user.index')->with('yes', 'Delete Successful');
        } catch (\Throwable $th) {  
            return redirect()->back()->with('no', 'Delete Failed');
        }
    }
}
