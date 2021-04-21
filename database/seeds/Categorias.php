<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Categorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'Culturales',
            'slug'=>'Culturales',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        
        DB::table('categories')->insert([
            'name'=>'Naturales',
            'slug'=>'Naturales',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('categories')->insert([
            'name'=>'Gubernamentales',
            'slug'=>'Gubernamentales',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('categories')->insert([
            'name'=>'Historicos',
            'slug'=>'Historicos',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('categories')->insert([
            'name'=>'Hoteles',
            'slug'=>'Hoteles',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);

        DB::table('categories')->insert([
            'name'=>'Paseos Naturales',
            'slug'=>'Paseos Naturales',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
    }
}
