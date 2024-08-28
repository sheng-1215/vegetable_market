<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class informations extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'informations';



    protected $fillable = [
        'name',
        'gender',
        'contact_number',
        'u_id',
        'address_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    
    public function address()
    {
        return $this->belongsTo(addresses::class, 'id');
    }
    


}
