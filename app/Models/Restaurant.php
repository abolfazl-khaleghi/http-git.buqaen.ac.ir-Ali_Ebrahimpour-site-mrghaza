<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'title','day','hour',
        'slug','picture',
        'description',
        'menu', 'designerComment', 'location',
        'address', 'phone', 'report', 'viewCount',
        'commentCount', 'slider_id', 'guild_id', 'city_id','servant_id'
    ];
    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function path()  //todo if slug enable not be comment !
    {
        $locale = app()->getLocale();
        return "/$locale/restaurant/$this->slug";
    }


    public function servant()
    {
        return $this->belongsTo(Servant::class);
    }
}
