<?php

use Illuminate\Database\Seeder;
use App\Obsan\Entities\Intervention;

class InterventionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Intervention::class, 45)->create();
    }
}
