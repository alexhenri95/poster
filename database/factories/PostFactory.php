<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(15);
        $user = User::all()->random();
        return [
            'body' => $name,
            'user_id' => $user->id,
            'image' => 'posts/' . $this->faker->image('public/storage/posts', 640,480, null, false)
        ];
    }
}
