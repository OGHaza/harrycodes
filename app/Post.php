<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_id',
		'title',
		'subtitle',
		'content',
        'user_id',
	];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->hasMany(PostTag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
