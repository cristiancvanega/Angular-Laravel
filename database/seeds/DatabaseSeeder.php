<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(EntityTableSeeder::class);
        $this->call(MunicipalityTableSeeder::class);
        $this->call(InterventionTableSeeder::class);
        $this->call(IntervenedTableSeeder::class);
        $this->call(IntervenedInterventionTableSeeder::class);
        $this->call(EvaluationTableSeeder::class);
    }
}
