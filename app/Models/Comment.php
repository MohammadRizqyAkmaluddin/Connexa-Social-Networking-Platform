<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{

    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
        'created_at'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'post_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }
}
