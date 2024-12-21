<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = [
        'code',      
        'discount',   
        'type',        
        'expires_at',  
        'usage_limit', 
        'usage_count',
        'is_active',
    ];

    protected $dates = [
        'expires_at',  
        'created_at',
        'updated_at',  
    ];

    protected $attributes = [
        'usage_count' => 0,
        'is_active' => true,
    ];

    public function getDiscountAttribute($value)
    {
        return $this->type === 'percentage' ? $value . '%' : $value;
    }
}
