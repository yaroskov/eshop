<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public $data_array = array(

    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => Str::random(15),
            'description' => Str::random(100),
            'manufacturers_id' => rand(1, 2),
            'section_id' => rand(1, 4),
            'colors_id' => rand(1, 3),
        ]);
    }
}
