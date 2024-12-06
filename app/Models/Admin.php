<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];
}
