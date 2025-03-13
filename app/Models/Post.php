<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'photo',
        'category_id',
        'user_id',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // $this means post belongs to user
    }
    // $post->user->name
}
