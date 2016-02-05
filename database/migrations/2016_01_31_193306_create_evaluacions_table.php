<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('intervencion_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->date('fecha')->notnull();
            $table->longText('descripcion_evidencia')->nullable();
            $table->enum('impacto', [
                'El impacto generado no presenta evidencias, el estado inicial es igual al estado final',
                'El impacto generado no presenta evidencias, el estado inicial es menor  que el estado final',
                'El impacto generado no presenta evidencias, el estado final es igual al estado ideal',
                'El impacto generado presenta evidencias, el estado inicial es igual al estado final',
                'El impacto generado presenta evidencias, el estado inicial es menor  que el estado final',
                'El impacto generado presenta evidencias, el estado final es igual al estado ideal',
                'El impacto generado presenta evidencias incompletas, el estado inicial es igual al estado final',
                'El impacto generado presenta evidencias incompletas, el estado inicial es menor  que el estado final',
                'El impacto generado presenta evidencias incompletas, el estado final es igual al estado ideal'
            ])->notnull();
            $table->enum('estado_inicial', [
                'bajo',
                'medio',
                'ideal'
            ]);
            $table->enum('estado_final', [
                'bajo',
                'medio',
                'ideal'
            ]);
            $table->longText('descripcion')->notnull();
            $table->longText('recomendaciones')->nullable();
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
        Schema::drop('evaluations');
    }
}
