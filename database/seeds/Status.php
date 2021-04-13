<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_publications')->insert([
            'status'=> 'PUBLICADO',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
        DB::table('state_publications')->insert([
            'status'=> 'NO PUBLICADO',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ]);
    }
}
