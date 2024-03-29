<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = "categoryId";
    protected $KeyType = "int";

    protected $fillable = [
        'imageId',
        'category',
    ];
    // protected $incrementing = true;
    // protected $timestamps = true;
}
