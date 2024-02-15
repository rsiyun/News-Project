<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $primaryKey = "imageId";
    protected $KeyType = "int";

    protected $fillable = [
        'image',
        'descImage',
    ];
}
