<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'inv_store' => $this->faker->numberBetween(0, 5000),
            'inv_house' => $this->faker->numberBetween(0, 5000),
            'description' => $this->faker->word(),
            'img' => $this->faker->image(null, 360, 360, 'food', true),
        ];
    }
}
