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
            'time_created' => $this->faker->Time(),
            'date_delivery' => $this->faker->dateTime()->format('Y-m-d'),
            'unities' => $this->faker->randomElement([10, 15, 20, 25, 30, 40, 50, 60, 70, 80]),
            'boxes' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'customer' => $this->faker->randomElement(Center::pluck('ID_CENTRE')->toArray()),
            'id_status' => $this->faker->randomElement(status::pluck('id')->toArray()),
            'received_date' => $this->faker->dateTime()->format('d-m-Y'),
            'news' => $this->faker->sentence(),
            'through' => $this->faker->randomElement(delivery::pluck('id_delivery')->toArray()),
            'sender' => $this->faker->sentence(),
            'created_at' => $this->faker->dateTime()->format('d-m-Y'),
            'updated_at' => $this->faker->dateTime()->format('d-m-Y'),
        ];
        return $validate;
    }

}
