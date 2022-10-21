<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' =>'Desarrollo Web'    ,'slug' =>Str::slug('Desarrollo Web'    )]);
        Category::create(['name' =>'Desarrollo Movil'  ,'slug' =>Str::slug('Desarrollo Movil'  )]);
        Category::create(['name' =>'Desarrollo Desktop','slug' =>Str::slug('Desarrollo Desktop')]);
        Category::create(['name' =>'Programación'      ,'slug' =>Str::slug('Programación'      )]);

    }
}
