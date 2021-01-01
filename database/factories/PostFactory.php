<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

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
        $id = rand(20, 200);
        $images = "https://picsum.photos/id/$id/200/300";
        return [
            'title' => $this->faker->sentence(),

            'slug' => Str::slug($this->faker->sentence()),
            'images' => $images,
            'description' => $this->faker->text(400),
            'user_id' => 1,

        ];
    }
}
