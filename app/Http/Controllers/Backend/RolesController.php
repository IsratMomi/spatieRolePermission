<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public $user;

    public function __construct(){
        $this->middleware(function($request, $next){
            $this->user = Auth::guard('admin')->user();
            return $next($request);

        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('role.view')){
            abort(403, 'Unauthorized access');
        }
        $roles = Role::all();
        return view('backend.pages.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('role.create')){
            abort(403, 'Unauthorized access');
        }
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroup();
        // dd($permissions_group);
        return view('backend.pages.roles.create',compact('permissions','permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('role.create')){
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ],[
            'name.required' => 'please write a role name'
        ]);

       $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
       $permissions = $request->permissions;
       if(!empty($permissions)){
        $role->syncPermissions($permissions);
       }

        return redirect()->route('roles.index')->with('success','Role added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('role.edit')){
            abort(403, 'Unauthorized access');
        }
        $role = Role::findById($id,'admin');
        // dd($role->permissions);
        $all_permission = Permission::all();
        $permission_groups = User::getpermissionGroup();
        return view('backend.pages.roles.edit',compact('role','all_permission','permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('role.update')){
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ],[
            'name.required' => 'please write a role name'
        ]);

       $role = Role::findById($id,'admin');
       $permissions = $request->permissions;
       if(!empty($permissions)){
        $role->syncPermissions($permissions);
       }

        return redirect()->back()->with('success','Role updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //    dd($id);
    if(is_null($this->user) || !$this->user->can('role.delete')){
        abort(403, 'Unauthorized access');
    }
        $role = Role::findById($id,'admin');
        if(!is_null($role)){
            $role->delete();
        }

        return redirect()->back()->with('success','Role deleted');
    }
}
