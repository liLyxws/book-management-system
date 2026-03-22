<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
    {
    return [
        // Gagawa ito ng "B-" + random number mula 1000 hanggang 9999
        'book_id' => 'B-' . $this->faker->unique()->numberBetween(1000, 9999),
        'title' => ucwords($this->faker->bs()), // Gagawa ng random title na may 3 words
        'author' => $this->faker->name(),
        'genre' => $this->faker->randomElement(['Fiction', 'Non-fiction', 'Sci-Fi', 'Mystery', 'Biography', 'Fantasy', 'Thriller', 'Historical', 'Self-help']),
        'year_published' => $this->faker->date('Y-m-d', 'now'),
    ];
    }
}
