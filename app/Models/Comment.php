<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'body',
        'status',
        'parent_id',
        'commentable_id',
        'commentable_type'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class , 'parent_id' , 'id');
    }

    public function setCommentAttribute($value)
    {
        $this->attributes['body'] = str_replace(PHP_EOL , "<br>" , $value);
    }

}
