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
            'name'=>'Cultural',
            'slug'=>'Cultural',
            'type'=> 'Sitio',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        
        DB::table('categories')->insert([
            'name'=>'Natural',
            'slug'=>'Natural',
            'type'=> 'Sitio',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('categories')->insert([
            'name'=>'Gubernamental',
            'slug'=>'Gubernamental',
            'type'=> 'Sitio',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('categories')->insert([
            'name'=>'Historica',
            'slug'=>'Historica',
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
