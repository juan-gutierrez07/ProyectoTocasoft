<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbousUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abous_us', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('position');
            $table->string('phone');
            $table->string('imagen_location');
            $table->foreignId('modul_id')->references('id')->on('moduls')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('abous_us');
    }
}
