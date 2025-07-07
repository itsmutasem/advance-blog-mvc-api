<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
//    use HasFactory;
    protected $fillable = ['title', 'body', 'author', 'published']; // fields that can be updated
    protected $guarded = ['id']; // cannot be updated/assigned (read only)

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
