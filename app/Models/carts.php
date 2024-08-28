<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class carts extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['user_id', 'p_id', 'mass','price'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'id');
    }
}
