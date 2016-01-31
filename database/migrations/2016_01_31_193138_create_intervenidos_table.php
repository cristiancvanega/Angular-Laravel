<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenidos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('nombre')->notnull();
            $table->enum('tipo_documento', ['Cédula de ciudadanía', 'Tarjeta de identidad', 'Registro civil de nacimiento',
                'Cédula de extranjería'])->notnull();
            $table->text('documento')->notnull();
            $table->text('datos_de_contacto')->notnull();
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
        Schema::drop('intervenidos');
    }
}
