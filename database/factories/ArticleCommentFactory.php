<?php

namespace Database\Factories;

use App\Models\{Article, ArticleComment};
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence,
            'article_id' => function () {
                return Article::factory()->create()->id;
            },
        ];
    }
}
