<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = Role::create(['name' =>'admin']);
        // $teacher = Role::create(['name' =>'teacher']);
        // $student = Role::create(['name' =>'student']);
        // $guest = Role::create(['name' =>'guest']);




        // $permissions = ['show','create','edit','update','delete'];

        // foreach (Role::all() as $role){
        //     foreach($permissions as $p){
        //         Permission::create(['name'=>"{$role->name} $p"]);
        //     }}

        //     $admin->syncPermissions(Permission::all());
        //     $teacher->syncPermissions(Permission::where('name','like',"%teacher%"));
        //     $student->syncPermissions(Permission::where('name','like',"%student%"));
        //     $guest->syncPermissions(Permission::where('name','like',"%guest%"));

        //     $instructor = Role::create(['name' => 'instructor']);


            //  $profe =User::create([
            //      'name' => 'Profe Henriquez',
            //      'email' => 'profe@gmail.com',
            //      'email_verified_at' => now(),
            //      'password' => bcrypt('123'),
            //      'remember_token' => Str::random(10)]);
            //      $profe->assignRole('instructor');

    for($i=1; $i<11; $i++)
         {
         $profe =User::create([
             'name' => 'profe Number-'.$i,
             'email' => 'profe'.$i.'@gmail.com',
             'email_verified_at' => now(),
             'password' => bcrypt('123'),
             'remember_token' => Str::random(10)]);
             $profe->assignRole('instructor');
         }

         for($i=1; $i<11; $i++)
         {
         $estudiante =User::create([
                 'name' => 'estudiante Number :-'.$i,
                 'email' => 'estudiante'.$i.'@gmail.com',
                 'email_verified_at' => now(),
                 'password' => bcrypt('123'),
                 'remember_token' => Str::random(10)]);
                 $estudiante->assignRole('estudiante');
                }

                 $estudiante =User::create([
                     'name' => 'estudiante Henriquez',
                     'email' => 'estudiante@gmail.com',
                     'email_verified_at' => now(),
                     'password' => bcrypt('123'),
                     'remember_token' => Str::random(10)]);
                     $estudiante->assignRole('estudiante');


         $guest =User::create([
                     'name' => 'Guest Henriquez',
                     'email' => 'guest@gmail.com',
                     'email_verified_at' => now(),
                     'password' => bcrypt('123'),
                     'remember_token' => Str::random(10)]);

          $admin =User::create([
                         'name' => 'Admin Henriquez',
                         'email' => 'admin@gmail.com',
                         'email_verified_at' => now(),
                         'password' => bcrypt('123'),
                         'remember_token' => Str::random(10)]);


        $user =User::create([
            'name' => 'Edwin Henriquez',
            'email' => 'ed@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10)]);
        $user->assignRole('super-admin');
    }
}
