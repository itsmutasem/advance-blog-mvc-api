<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    use HasFactory;
    protected $fillable = ['title', 'body', 'published']; // fields that can be updated
    protected $guarded = ['id']; // cannot be updated/assigned (read only)
}
