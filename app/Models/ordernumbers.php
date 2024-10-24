<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordernumbers extends Model
{
    use HasFactory;
    protected $fillable = ["trade_number"];
}
