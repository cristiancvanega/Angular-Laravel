<?php

use Illuminate\Database\Seeder;

class IntervenedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Obsan\Entities\Intervened::class, 15)->create();
    }
}
