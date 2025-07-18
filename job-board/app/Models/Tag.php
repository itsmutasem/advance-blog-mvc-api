<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Primary Key
    use HasUuids;
    protected $primaryKey = 'id';
    protected $keyType = 'string'; // UUID - Universal Unique Identifier
    public $incrementing = false;

    protected $table = 'tag';
    protected $fillable = ['title'];
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}


