<?php

namespace Database\Factories;

use App\Models\EventCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->randomNumber(),
            'count' => $this->faker->numberBetween(1, 1000),
            'expires_at' => now()->addDay()->toDateTimeString(),
        ];
    }
}
