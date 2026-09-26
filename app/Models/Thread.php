<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Thread extends Model
{
    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
