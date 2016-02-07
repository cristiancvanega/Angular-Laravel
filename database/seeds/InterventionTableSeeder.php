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
        $i = 1;
        while($i < 16)
        {
            for($j = 1; $j < 4; $j++)
            {
                $intervention = factory(Intervention::class)->make();
                $intervention['entity_id'] = $i;
                $intervention['municipality_id'] = $i;
                $intervention->save();
            }
            $i++;
        }
    }
}
