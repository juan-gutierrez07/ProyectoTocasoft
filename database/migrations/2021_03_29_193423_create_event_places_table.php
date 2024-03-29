<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_places', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->text('descripcion');
            $table->string('color',30);
            $table->string('imagen_location');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->foreignId('place_id')->references('id')->on('places')->onUpdate('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('event_places');
    }
}
