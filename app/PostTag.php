<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $fillable = [
		'post_id',
		'tag',
	];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
