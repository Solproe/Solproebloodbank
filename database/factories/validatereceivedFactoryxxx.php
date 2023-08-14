<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\delivery;
use App\Models\Inventories\delivery\validatereceived;
use App\Models\status\status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class validatereceivedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = validatereceived::class;

    public function definition()
    {
        return [
            'create_at' => $this->faker->dateTime(),
            'id' => $this->faker->unique()->randomDigit(),
            'consecutive' => Str::random(10),
            'customer' => $this->faker->randomElement(Center::pluck('ID_CENTRE')->toArray()),
            'id_user' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'date' => $this->faker->dateTime(),
            'unities' => $this->faker->randomNumber(),
            'boxes' => $this->faker->randomNumber(),
            'id_status' => $this->faker->randomElement(status::pluck('id')->toArray()),
            'received_date' => $this->faker->dateTime(),
            'news' => $this->faker->sentence(),
            'through' => $this->faker->randomElement(delivery::pluck('id_delivery')->toArray()),
            'sender' => $this->faker->word(),
        ];
    }

}
