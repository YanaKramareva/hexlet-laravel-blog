<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'state', 'category_id'];

    public function isPublished()
    {
        return $this->state == 'published';
    }

    public function category()
    {
        return $this->belongsTo(__NAMESPACE__ . '\ArticleCategory');
    }

    public function comments()
    {
        return $this->hasMany(__NAMESPACE__ . '\ArticleComment');
    }
}
