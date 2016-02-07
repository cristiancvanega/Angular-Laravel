<?php

use Illuminate\Database\Seeder;
use App\Obsan\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class, 50)->create();
    }
}
