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
        Schema::create('evaluacions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('intervencion_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->date('fecha')->notnull();
            $table->longText('descripcion_evidencia')->nullable();
            $table->enum('impacto', ['El impacto generado no presenta evidencias, el estado inicial es igual al estado final',
                'El impacto generado presenta evidencias pero los estados inicial y final son iguales',
                'El impacto generado presenta evidencias y el estado final mejora al estado inicial'
            ])->notnull();
            $table->enum('evaluacion_impacto', ['Positivo', 'Negativo', 'Nulo'])->notnull();
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
        Schema::drop('evaluacions');
    }
}
