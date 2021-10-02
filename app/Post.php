<?php

namespace App;

use App\Image;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'post'];

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the phone record associated with the user.
     */
    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
