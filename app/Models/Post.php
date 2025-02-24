<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return PostFactory::new();
    }

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title',
        'user_id',
    ];
}
