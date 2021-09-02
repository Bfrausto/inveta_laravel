<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // factory()
        // find(1)

        return [
            'client_id' =>Client::factory(),
            'client_name' =>function (array $attributes) {
                return Client::find($attributes['client_id'])->name;
            },
            'product_id' =>Product::factory(),
            'product_name' =>function (array $attributes) {
                return Product::find($attributes['product_id'])->name;
            },

            'price' =>$this->faker->numberBetween(0, 50),

            'inv_house' => $this->faker->numberBetween(0, 200),
            'inv_store' => $this->faker->numberBetween(0, 200),
            'transaction'=>function (array $attributes) {
                return $attributes['price'] * ($attributes['inv_house'] + $attributes['inv_store']);
            },
            'balance' =>function (array $attributes) {
                $client=Client::find($attributes['client_id']);
                $client->balance+=$attributes[ 'transaction'];
                $client->save();
                return $client->balance;
            },
        ];
    }
}
// $client = Client::factory();
//         $product =Product::factory();
//         $price=$this->faker->numberBetween(0, 50);
//         $inv_store=$this->faker->numberBetween(0, 200);
//         $inv_house=$this->faker->numberBetween(0, 200);
//         $balance=$client->balance;
//         $transaction=$price * ($inv_house + $inv_store);
//         return [
//             'client_id' =>function (array $attributes) {
//                 return User::find($attributes['user_id'])->type;
//             },,
//             'client_name' =>$client->name,
//             'product_id' =>$product->id,
//             'product_name' =>$product->name,

//             'price' =>$price,

//             'inv_house' =>$inv_house,
//             'inv_store' =>$inv_store,
//             'transaction'=>$transaction,

//             'balance' =>function ($balance,$transaction) {
//                 return $balance+$transaction;
//             },
