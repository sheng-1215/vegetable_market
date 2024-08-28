<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'address_line_1', 
        'address_line_2', 
        'city', 
        'state', 
        'postal_code'
    ];
}
