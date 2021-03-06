<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    protected $fillable=[
        'shaba','codeMelli','cardNumber','user_id','city_id','province_id',
    ];

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }

}
