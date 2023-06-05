<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->name(),
            'location'=>fake()->name(),
            'image'=>fake()->name(),
            'tags'=>fake()->name(),
            'company'=>fake()->name(),
            'email'=>fake()->email()
        
            
        ];
    }
}
