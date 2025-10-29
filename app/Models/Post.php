<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = 
    [
        'post_type',
        'user_id', 
        'description',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function postImages()
    {
        return $this->hasMany(PostImage::class, 'post_id', 'post_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'post_id');
    }
     public function likes()
    {
        return $this->hasMany(Like::class, 'post_id', 'post_id');
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }
}
