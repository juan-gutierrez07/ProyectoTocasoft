<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Modulos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('moduls')->insert([
            'name'=>'Sitios Turisticos',
            'slug'=>'sitios',
            'description'=> ' ',
            'user_id' => 1,
            'state_publication_id' =>  1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('moduls')->insert([
            'name'=>'Personal',
            'slug'=>'personal',
            'description'=> ' ',
            'user_id' => 1,
            'state_publication_id' =>  1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('moduls')->insert([
            'name'=>'Rutas',
            'slug'=>'rutas',
            'description'=> ' ',
            'user_id' => 1,
            'state_publication_id' =>  1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('moduls')->insert([
            'name'=>'Eventos',
            'slug'=>'eventos',
            'description'=> ' ',
            'user_id' => 1,
            'state_publication_id' =>  1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
    }
}
