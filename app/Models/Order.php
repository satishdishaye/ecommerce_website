<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ="orders";
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'country', 'address', 'address_line_2', 
        'city', 'state', 'postcode', 'phone', 'email', 'is_account_created', 
        'password', 'is_shipping_address_different', 'order_notes','coupon_code', 
        'subtotal', 'total', 'payment_method', 'status',
    ];
    

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
