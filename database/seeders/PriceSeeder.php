<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Price::create(['name'=>'Gratis',           'value'=>0 ,'slug'=>Str::slug('Gratis'       )]);
       Price::create(['name'=>'9.99 $ Nivel 1', 'value'=>9.99,'slug'=>Str::slug('9.99 $ Nivel 1')]);
       Price::create(['name'=>'49.99 Nivel 2', 'value'=>49.99,'slug'=>Str::slug('49.99 Nivel 2')]);
       Price::create(['name'=>'99.99 Nivel 3',     'value'=>0,'slug'=>Str::slug('99.99 Nivel 3')]);

    }
}
