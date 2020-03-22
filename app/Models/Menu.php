<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'page_id'
    ];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
