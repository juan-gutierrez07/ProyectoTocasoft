<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->references('id')->on('categories')->onUpdate('cascade')->onUpdate('cascade');
            $table->string('direccion');
            $table->string('lat')->unique();
            $table->string('lng')->unique();
            $table->string('telefono');
            $table->text('descripcion');
            $table->string('imagen_principal');
            $table->time('apertura');
            $table->time('cierre');
            $table->uuid('uuid');
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
        Schema::dropIfExists('places');
    }
}
