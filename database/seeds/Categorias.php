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
            'type'=> 'Sitio',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        
        DB::table('categories')->insert([
            'name'=>'Naturales',
            'slug'=>'Naturales',
            'type'=> 'Sitio',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('categories')->insert([
            'name'=>'Gubernamentales',
            'slug'=>'Gubernamentales',
            'type'=> 'Sitio',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('categories')->insert([
            'name'=>'Historicos',
            'slug'=>'Historicos',
            'type'=> 'Ruta',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('categories')->insert([
            'name'=>'Hoteles',
            'slug'=>'Hoteles',
            'type'=> 'Sitio',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
    }
}
