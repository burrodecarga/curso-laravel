<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        //  $this->middleware(['can:listar roles'])->only('index');
        //  $this->middleware(['can:crear roles'])->only('create,store');
        //  $this->middleware(['can:editar roles'])->only('edit,update');
        //  $this->middleware(['can:eliminar roles'])->only('destroy');
     }

    public function index()
    {
       $roles = Role::all();
        return view('admin.roles.index',compact('roles')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role;
        $permissions = Permission::orderBy('permission', 'asc')->get();
        $permission_id = [];
        $title = "new role";
        $btn = "save";
        return view('admin.roles.create', compact('role', 'permissions', 'permission_id', 'title', 'btn'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required|unique:roles,name',
           'permissions'=>'required',
       ]);
       $role = Role::create([
           'name'=>$request->name,
           'area'=>$request->area,
       ]);
       foreach ($request->permissions as $key => $p) {
        $role->givePermissionTo($p);
    }
    return redirect()->route('admin.roles.index')->with('info', 'Role ' . $role->name . ' creado exitosamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $title = "show role";
        $btn = "back";
        $permission_id = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::orderBy('permission', 'asc')->get();

        return view('admin.roles.show',compact('role','title','btn','permissions','permission_id')); //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission_id = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::orderBy('permission', 'asc')->get();
        $btn = "modify";
        $title = "modify role: ".$role->name ;
        return view('admin.roles.edit', compact('role', 'permission_id', 'permissions', 'title', 'btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update([
            "name" => $request->name,
            "area" => $request->area,
        ]);
        $permissions = $request->permissions;
        $role->syncPermissions([]);
        //dd($role->permissions);
        foreach ($permissions as $key => $p) {
            $role->givePermissionTo($p);
        }
        return redirect()->route('admin.roles.index')->with('info', 'Role ' . $role->name . ' actualizado exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->id==6){        return redirect()->route('admin.roles.index')->with('info','This role is no destroyed');
        }
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info','Role destroyed successfully');
    }
}
