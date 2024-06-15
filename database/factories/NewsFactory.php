<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        $created_at = Carbon::instance($this->faker->dateTimeBetween('-2 years', 'now'));
        return [
            'user_id' => $this->faker->randomElement($userIds),
            'title' => fake()->sentence(),
            'description' => fake()->paragraphs(3,true),
            'image_path' => fake()->imageUrl(),
            'created_at' => $created_at,
            'updated_at' => $created_at
        ];
    }

    public function user($id)
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $id
        ]);
    }
}
