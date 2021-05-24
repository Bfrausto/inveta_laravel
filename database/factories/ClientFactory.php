<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'balance' => $this->faker->numberBetween(0, 5000),
            'enterprise' => $this->faker->word(),
            'adress'=>$this->faker->streetAddress(),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => $this->faker->e164PhoneNumber(),
            'RFC' =>$this->faker->ssn()
        ];
    }
}
