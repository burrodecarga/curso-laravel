<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');

        
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(CategorySeeder::class);

        \App\Models\User::factory(10)->create();

        $this->call(PlatFormSeeder::class);
         $this->call(CourseSeeder::class);
         $this->call(ReviewSeeder::class);




    }
}
