<?php

namespace Database\Seeders;

use App\Models\Inventories\supplies\supplies;
use Illuminate\Database\Seeder;

class SupppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $supplies = [

            [
                'id' => '1',
                'supply_cod' => '1',
                'supply_name' => 'Algodon',
                'supply_description' => 'Algodon',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '2',
                'supply_cod' => '2',
                'supply_name' => 'Curas',
                'supply_description' => 'Curas',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '3',
                'supply_cod' => '3',
                'supply_name' => 'Alcohol',
                'supply_description' => 'Alcohol',
                'created_by' => '10',
                'status' => '1',

            ],

            [
                'id' => '4',
                'supply_cod' => '4',
                'supply_name' => 'Bolsas de sangre Cuadruple',
                'supply_description' => 'Bolsas de sangre Cuadruple',
                'created_by' => '10',
                'status' => '1',
            ],
            [
                'id' => '5',
                'supply_cod' => '5',
                'supply_name' => 'Bolsas de sangre Triple',
                'supply_description' => 'Bolsas de sangre Triple',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '6',
                'supply_cod' => '6',
                'supply_name' => 'Bebida Refrescante',
                'supply_description' => 'Bebida Refrescante',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '6',
                'supply_cod' => '6',
                'supply_name' => 'Botellas de agua',
                'supply_description' => 'Botellas de agua',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '7',
                'supply_cod' => '7',
                'supply_name' => 'Encuestas Waacar',
                'supply_description' => 'Encuestas Waacar',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '8',
                'supply_cod' => '8',
                'supply_name' => 'Boligrafos Negro',
                'supply_description' => 'Boligrafos Negro',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '9',
                'supply_cod' => '9',
                'supply_name' => 'Galletas',
                'supply_description' => 'Galletas',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '10',
                'supply_cod' => '10',
                'supply_name' => 'Bocadillos',
                'supply_description' => 'Bocadillos',
                'created_by' => '10',
                'status' => '1',
            ],

            [
                'id' => '11',
                'supply_cod' => '',
                'supply_name' => 'Lancetas',
                'supply_description' => 'Lancetas',
                'created_by' => '10',
                'status' => '1',
            ],

        ];
        foreach ($supplies as $supplie) {
            $supplie = supplies::factory(1)->create($supplie)->first();
        }

    }
}
