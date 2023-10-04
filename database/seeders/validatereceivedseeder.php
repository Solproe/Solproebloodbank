<?php

namespace Database\Seeders;

use App\Models\Inventories\delivery\validatereceived;
use Illuminate\Database\Seeder;

class validatereceivedseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        validatereceived::factory(50)->create();

    }
}
