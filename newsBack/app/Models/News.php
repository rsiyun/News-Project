<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = "newsId";
    protected $fillable = ['categoryId', 'headLineImage', 'title', 'slug', 'newsContent'];
}
