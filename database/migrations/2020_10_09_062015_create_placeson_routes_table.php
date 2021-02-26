<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesonRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_tuorist_route', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->references('id')->on('places')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tuorist_route_id')->references('id')->on('tuorist_routes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placeson_routes');
    }
}
