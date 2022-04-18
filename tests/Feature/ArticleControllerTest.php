<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Article;

class ArticleControllerTest extends TestCase
{
    public function testIndex()
    {
        Article::factory()->count(10)->create();
        $response = $this->get(route('articles.index'));
        $response->assertStatus(200);
    }

    public function testIndexWithQ()
    {
        [$article1, $article2] = Article::factory()->count(2)->create();
        $response = $this->get(route('articles.index', ['q' => $article1->name]));
        $response->assertStatus(200);
        $response->assertSeeText($article1->name);
        $response->assertDontSeeText($article2->name);
        $response->assertSee(sprintf('value="%s"', e($article1->name)), false);
        $response->assertDontSeeText($article2->name);
    }

    public function testIndexWithQ2()
    {
        [$article1, $article2] = Article::factory()->count(2)->create();
        $response = $this->get(route('articles.index', ['q' => $article1->name]));
        $response->assertStatus(200);
        $response->assertSeeText($article1->name);
        $response->assertSee(sprintf('value="%s"', e($article1->name)), false);
        $response->assertDontSeeText($article2->name);
    }
}
