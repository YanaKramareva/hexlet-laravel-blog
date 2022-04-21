<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\{Article, ArticleCategory};

class ArticleCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        Article::factory()->count(10)->create();
        $response = $this->get(route('article_categories.index'));
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $category = ArticleCategory::factory()->create();
        $response = $this->get(route('article_categories.edit', $category));
        $response->assertSee('PATCH');
        $response->assertStatus(200);
    }

    public function testUpdateWithValidationErrors()
    {
        $category = ArticleCategory::factory()->create();
        $params = [
            'description' => 'b',
            'state' => 'draft'
        ];
        $response = $this->patch(route('article_categories.update', $category), $params);
        $response->assertSessionHasErrors();
    }

    public function testUpdate()
    {
        $category = ArticleCategory::factory()->create();
        $params = [
            'name' => 'jopa',
            'description' => str_repeat('lala', 50),
            'state' => 'draft'
        ];
        $response = $this->patch(route('article_categories.update', $category), $params);
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('article_categories', [
            'name' => 'jopa'
        ]);
    }
}
