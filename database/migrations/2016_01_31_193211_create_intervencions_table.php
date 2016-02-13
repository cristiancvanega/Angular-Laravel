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
        Schema::create('interventions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('entity_id')->unsigned();
            $table->integer('municipality_id')->unsigned();
            $table->text('name')->notnull();
            $table->date('start_date')->notnull();
            $table->date('end_date')->nullable();
            $table->longText('description')->notnull();
            $table->longText('evidencias_planeadas');
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
        Schema::drop('interventions');
    }
}
