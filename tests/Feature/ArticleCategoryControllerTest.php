<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Article;

class ArticleCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        Article::factory()->count(10)->create();
        $response = $this->get(route('article_categories.index'));
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get(route('article_categories.create'));
        $response->assertStatus(200);
    }

    public function testStoreWithValidationErrors()
    {
        $params = [
            'description' => 'b',
            'state' => 'draft'
        ];
        $response = $this->post(route('article_categories.store'), $params);
        $response->assertStatus(302);
        $response->assertSessionHasErrors();

        $this->assertDatabaseMissing('article_categories', $params);

        $params = [
            'name' => str_repeat('name', 26),
            'description' => str_repeat('lala', 50),
            'state' => 'draft'
        ];

        $response = $this->post(route('article_categories.store'), $params);
        $response->assertStatus(302);
        $response->assertSessionHasErrors();

        $this->assertDatabaseMissing('article_categories', $params);

        $params = [
            'name' => 'hop hey lala test',
            'description' => str_repeat('lala', 50),
            'state' => 'dratt'
        ];

        $response = $this->post(route('article_categories.store'), $params);
        $response->assertStatus(302);
        $response->assertSessionHasErrors();

        $this->assertDatabaseMissing('article_categories', $params);
    }

    public function testStore()
    {
        $params = [
            'name' => 'jopa',
            'description' => str_repeat('lala', 60),
            'state' => 'draft'
        ];
        $response = $this->post(route('article_categories.store'), $params);
        $response->assertStatus(302);

        $this->assertDatabaseHas('article_categories', [
            'name' => 'jopa'
        ]);
    }
}
