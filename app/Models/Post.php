<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Thread;

class Post extends Model
{
    protected $fillable = ['thread_id', 'body'];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}