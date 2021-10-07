<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1,10000),
            'buy_date' => $this->faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        ];
    }
}
