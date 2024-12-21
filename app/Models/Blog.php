<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'published_at',
        'comments_count',
        'content',
        'excerpt',
        'image_url',
        'categories',
        'tags',
    ];

 

    public function category(){
        return $this->belongsTo(BlogCategory::class,"categories","id");
    }
}
