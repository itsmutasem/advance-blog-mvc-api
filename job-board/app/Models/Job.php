<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
//    use HasFactory;
    public static function all(): array
    {
        return [
            ['title' => 'Software Engineer', 'Salary' => '$2000'],
            ['title' => 'AI Engineer', 'Salary' => '$1800']
        ];
    }
}
