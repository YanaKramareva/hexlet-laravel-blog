<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function article()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Article');
    }
}
