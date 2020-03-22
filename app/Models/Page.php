<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = [
        'title','link', 'name', 'description', 'tags', 'viewCount', 'commentCount'
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
