<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job
{
//    use HasFactory;
    public static function all(): array
    {
        return [
            ['title' => 'Software Engineer', 'salary' => '$2000'],
            ['title' => 'AI Engineer', 'salary' => '$1800']
        ];
    }
}
