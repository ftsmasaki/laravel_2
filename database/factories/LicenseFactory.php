<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\License;

class LicenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_key = $this->faker->bothify('*****-*****-*****-*****-*****');

        return [
            'product_name' => $this->faker->randomElement(['Microsoft Office Home & Business 2021','ESET Internet Security','YMS-VPN8']),
            'product_key' => $this->faker->toUpper($product_key),
            'expire_date' => $this->faker->dateTimeBetween('+1 year', '+5 year'),
            'purchase_date' => $this->faker->dateTimeBetween('-5 year', '-1 week'),
            'is_notify' => $this->faker->numberBetween(0,1),
            'seats' => $this->faker->randomElement([1,2,5]),
        ];
    }
}
