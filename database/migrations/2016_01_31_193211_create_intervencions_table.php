<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervencions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('entidad_id')->unsigned();
            $table->integer('municipio_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('nombre')->notnull();
            $table->date('fecha_inicio')->notnull();
            $table->date('fecha_fin')->nullable();
            $table->text('direccion')->notnull();
            $table->longText('descripcion')->notnull();
            $table->enum('diversidad_dieta_inicio', ['Completa', 'Moderada', 'Incompleta'])->notnull();
            $table->enum('diversidad_dieta_fin', ['Completa', 'Moderada', 'Incompleta'])->nullable();
            $table->enum('variedad_dieta_inicio', ['Variada', 'Poco variada', 'Monótona'])->notnull();
            $table->enum('variedad_dieta_fin', ['Variada', 'Poco variada', 'Monótona'])->nullable();
            $table->enum('inseguridad_alimentaria_inicio', ['Segura', 'Leve', 'Moderada', 'Severa'])->notnull();
            $table->enum('inseguridad_alimentaria_fin', ['Segura', 'Leve', 'Moderada', 'Severa'])->nullable();
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
        Schema::drop('intervencions');
    }
}
