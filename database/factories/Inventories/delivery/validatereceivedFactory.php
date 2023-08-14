<?php

namespace Database\Factories\Inventories\delivery;

use App\Models\Center;
use App\Models\delivery;
use App\Models\Inventories\delivery\validatereceived;
use App\Models\status\status;
use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\inventories\delivery\validatereceived>
 */
class validatereceivedFactory extends Factory
{
    protected $model = validatereceived::class;

    public function definition()
    {
        $validate = [
            /* 'id' => function () {
            return validatereceived::inRandomOrder()->first();
            }, */
            'consecutive' => Str::random(10),
            'id_user' => User::factory(),
            'date' => $this->faker->DateTime()->format('d-m-Y H:i:s'),
            'unities' => $this->faker->randomNumber(),
            'boxes' => $this->faker->randomNumber(),
            'customer' => $this->faker->randomElement(Center::pluck('ID_CENTRE')->toArray()),
            'id_status' => $this->faker->randomElement(status::pluck('id')->toArray()),
            'received_date' => $this->faker->DateTime()->format('d-m-Y H:i:s'),
            'news' => $this->faker->sentence(),
            'through' => $this->faker->randomElement(delivery::pluck('id_delivery')->toArray()),
            'sender' => $this->faker->sentence(),
            'create_at' => $this->faker->DateTime()->format('d-m-Y H:i:s'),
            'update_at' => $this->faker->DateTime()->format('d-m-Y H:i:s'),
        ];
        return $validate;
    }

}
