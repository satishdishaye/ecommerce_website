<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table ="blog_category";

    protected $fillable = [
        'category_name',
        'status',
    ];



   

    public function scopeSearch($query, $search)
{
    return $query->where('category_name', 'like', '%' . $search . '%');
}
}
