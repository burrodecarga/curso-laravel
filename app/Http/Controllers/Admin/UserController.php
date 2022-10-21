<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware(['can:listar usuarios'])->only('index');
        // $this->middleware(['can:crear usuarios'])->only('create,store');
        // $this->middleware(['can:editar usuarios'])->only('edit,update');
        // $this->middleware(['can:eliminar usuarios'])->only('destroy');
    }

    public function index()
    {
     return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('admin.users.store');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userRoles = $user->roles()->pluck('id');
        $roles = Role::all();
        $btn = "modify";
        $title = "user";
        return view('admin.users.edit', compact('user', 'userRoles', 'roles', 'title', 'btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($user->id==1){        return redirect()->route('admin.users.index')->with('info','This user is no edited');
        }
        $user->syncRoles($request->roles);
        return redirect()->route('admin.users.index')->with('info','Role asigned successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return view('admin.users.destroy');

    }
}
