<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTouristRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tourist_routes', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->text('descripcion');
            $table->time('start');
            $table->time('finish');
            $table->foreignId('tourist_route_id')->references('id')->on('tuorist_routes')->onUpdate('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('event_tourist_routes');
    }
}
