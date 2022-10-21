<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $admin->syncPermissions([
            'crear curso',
            'leer curso',
            'actualizar curso',
            'eliminar curso',
            'ver dashboard',
            'crear role',
            'listar role',
            'eliminar role',
            'leer usuarios',
            'editar usuario',
        ]);

        $instructor = Role::create(['name' => 'instructor']);
        $instructor->syncPermissions([
            'crear curso',
            'leer curso',
            'actualizar curso',
            'eliminar curso',
            'ver dashboard',
        ]);

        $estudiante = Role::create(['name' => 'estudiante']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

    }
}
