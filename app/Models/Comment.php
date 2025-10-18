<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'comment_id';
    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment'
    ];

    // Relasi ke post
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'post_id');
    }

    // Relasi ke user yang komentar
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
