<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Permission::create([ 'name' =>'crear curso'      ]);
      Permission::create([ 'name' =>'leer curso'       ]);
      Permission::create([ 'name' =>'actualizar curso' ]);
      Permission::create([ 'name' =>'eliminar curso'   ]);
      Permission::create([ 'name' =>'ver dashboard'    ]);
      Permission::create([ 'name' =>'crear role'       ]);
      Permission::create([ 'name' =>'listar role'      ]);
      Permission::create([ 'name' =>'eliminar role'    ]);
      Permission::create([ 'name' =>'leer usuarios'    ]);
      Permission::create([ 'name' =>'editar usuario'   ]);
    }
}
