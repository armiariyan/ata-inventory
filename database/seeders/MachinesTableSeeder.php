<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MachinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Machine::factory(5)->create();
    }
}
