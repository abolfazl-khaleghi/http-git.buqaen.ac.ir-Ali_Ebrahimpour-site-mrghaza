<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id','birthday','fatherName','city_id',
    ];


}
