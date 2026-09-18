<?php

namespace Database\Factories;

use App\Models\CategoryShop;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Factory<Product>
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
        $colors = fake()->hexColor();
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="400">'
            . '<rect width="100%" height="100%" fill="' . $colors . '"/>'
            . '</svg>';
        $fileName = (md5(uniqid()));
        $filePath = 'products/' .$fileName. '.svg';
        Storage::disk('public')->put("products/" .$fileName .".svg", $svg);
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->text(),
            'count' => $this->faker->randomDigit(),
            'delivery' => $this->faker->randomElement([0,1,2,3,4,5,6,7,8,9]),
            'sort' => $this->faker->randomDigit(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'image' => $filePath,
            'is_active' => (bool)rand(0, 1),
        ];
    }
    public function configure(): static
    {
        return $this->afterCreating(function (Product $product) {
            $categoryId = CategoryShop::inRandomOrder()->first()?->id;
            $product->categories()->attach($categoryId);
        });
    }

}
