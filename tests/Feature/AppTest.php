<?php

namespace Tests\Feature;

use Tests\TestCase;

class AppTest extends TestCase
{
    public function testArticles()
    {
        $a1 = \App\Models\Article::factory()->create(['state' => 'draft']);
        $a2 = \App\Models\Article::factory()->create();
        $a3 = \App\Models\Article::factory()->create(['likes_count' => 5]);
        $a4 = \App\Models\Article::factory()->create();
        $response = $this->get('/rating');
        $response->assertStatus(200);
        $response->assertDontSeeText($a1->name);
        $response->assertSeeText($a2->name);
        $response->assertSeeText($a3->name);
        $response->assertSeeText($a4->name);
    }
}
