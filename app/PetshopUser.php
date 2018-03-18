<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetshopUser extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'petshop_id',
        'user_id'
    ];
}
