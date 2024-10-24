<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderlists extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'p_id',
        'u_id',
        'c_status',
        'c_id'
    ];
}
