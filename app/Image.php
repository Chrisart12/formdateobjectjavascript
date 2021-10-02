<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path', 'post_id'];

    /**
     * Get the post that owns the image.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
