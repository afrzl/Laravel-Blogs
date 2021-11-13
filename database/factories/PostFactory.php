<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'post_type' => 'Post',
            'published_at' => date('Y-m-d H:i:s'),
            'status' => 1,
            'body' => $this->faker->paragraph(1),
            'user_id' => $user->id
        ];
    }
}