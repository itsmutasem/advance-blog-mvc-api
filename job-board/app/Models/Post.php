<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUuids;
    protected $primaryKey = 'id';
    protected $keyType = 'string'; // UUID - Universal Unique Identifier
    public $incrementing = false;
    protected $table = 'post';
//    use HasFactory;
    protected $fillable = ['title', 'body', 'author', 'published']; // fields that can be updated
    protected $guarded = ['id']; // cannot be updated/assigned (read only)

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
