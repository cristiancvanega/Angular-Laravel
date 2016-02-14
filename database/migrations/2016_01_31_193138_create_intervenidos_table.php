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
        Schema::create('intervened', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('name')->notnull();
            $table->enum('document_type',
                [
                    'Cédula de ciudadanía',
                    'Tarjeta de identidad',
                    'Registro civil de nacimiento',
                    'Cédula de extranjería'
                ])->notnull();
            $table->text('document')->notnull();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->enum('pupilage',
                [
                    'Ninguna',
                    'Preescolar',
                    'Primaria',
                    'Bachillerato',
                    'Universidad'
                ]);
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
        Schema::drop('intervened');
    }
}
