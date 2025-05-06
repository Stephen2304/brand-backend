<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $casinoSuffixes = ['Casino', 'Bet', 'Play', 'Win', 'Luck', 'Jackpot', 'Vegas', 'Royal', 'Palace'];
        $casinoPrefixes = ['Super', 'Mega', 'Ultra', 'Royal', 'Lucky', 'Golden', 'Diamond', 'Elite', 'Premium'];

        return [
            'brand_name' => $this->faker->randomElement($casinoPrefixes) . ' ' . $this->faker->randomElement($casinoSuffixes),
            'brand_image' => $this->faker->imageUrl(640, 480, 'business', true),
            'rating' => $this->faker->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the brand is highly rated.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function highlyRated()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => $this->faker->numberBetween(4, 5),
            ];
        });
    }

    /**
     * Indicate that the brand is average rated.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function averageRated()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => 3,
            ];
        });
    }

    /**
     * Indicate that the brand is poorly rated.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function poorlyRated()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => $this->faker->numberBetween(1, 2),
            ];
        });
    }
}