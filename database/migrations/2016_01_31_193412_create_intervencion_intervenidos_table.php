<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervencionIntervenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervencion_intervenidos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_intervencions')->unsigned();
            $table->foreign('id_intervencions')->references('id')->on('intervencions')->onDelete('cascade');

            $table->integer('id_intervenidos')->unsigned();
            $table->foreign('id_intervenidos')->references('id')->on('intervenidos')->onDelete('cascade');

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
        Schema::drop('intervencion_intervenidos');
    }
}
