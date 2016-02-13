<?php

use Illuminate\Database\Seeder;

class IntervenedInterventionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Obsan\Entities\IntervenedIntervention::class, 30)->create();
    }
}
