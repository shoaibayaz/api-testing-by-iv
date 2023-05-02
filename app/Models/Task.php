<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search($queryString): Builder
    {
        return static::query()
            ->where('task', 'like', "%$queryString%")
            ->orWhere('title', 'like', "%$queryString%")
            ->orWhere('description', 'like', "%$queryString%")
            ->orWhere('color_code', 'like', "%$queryString%");
    }
}
