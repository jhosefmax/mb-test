<?php


namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'location' => $this->faker->city,
            'validTo' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'category' => $this->faker->randomElement(['Electronics', 'Clothing', 'Books', 'Food']),
        ];
    }
}
