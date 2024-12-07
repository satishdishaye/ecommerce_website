<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ="product";

    protected $fillable = [
        'cat_id',
        'product_name',
        'price',
        'description',
        'status',
    ];


    public function category(){
        return $this->belongsTo(Category::class,"cat_id","id");
    }
}
