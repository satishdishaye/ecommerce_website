<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ="category";

    protected $fillable = [
        'category_name',
        'status',
    ];



   

    public function scopeSearch($query, $search)
{
    return $query->where('category_name', 'like', '%' . $search . '%');
}

}
