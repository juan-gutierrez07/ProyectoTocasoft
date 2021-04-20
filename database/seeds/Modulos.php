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
            'slug'=>'Sitios',
            'description'=> ' ',
            'state_publication_id' =>  1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('moduls')->insert([
            'name'=>'Personal',
            'slug'=>'Personal',
            'description'=> ' ',
            'state_publication_id' =>  1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('moduls')->insert([
            'name'=>'Rutas',
            'slug'=>'Rutas',
            'description'=> ' ',
            'state_publication_id' =>  1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
      
    }
}
