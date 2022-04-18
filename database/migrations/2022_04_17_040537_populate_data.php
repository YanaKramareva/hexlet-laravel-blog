<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{ArticleCategory, Article};

class PopulateData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ArticleCategory::factory()->count(5)->make()->each(function ($category) {
            $category->state = rand(0, 1) ? 'created' : 'published';
            $category->save();
            Article::factory()->count(5)->make()->each(function ($article) use ($category) {
                $article->state = rand(0, 1) ? 'draft' : 'published';
                $article->likes_count = rand(0, 10);
                $article->category()->associate($category);
                $article->save();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
