<?php

namespace Database\Factories;

use App\Models\CurrentPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrentPriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrentPrice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'    => $this->faker->randomNumber(),
            'value'         => $this->faker->randomFloat(2, 0, 100),
            'currency_code' => $this->faker->currencyCode
        ];
    }
}
