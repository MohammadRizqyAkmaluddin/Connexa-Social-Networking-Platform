<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'post_images';
    protected $primaryKey = 'image_id';
    public $timestamps = false;

    protected $fillable =
    [
        'post_id',
        'image'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'post_id');
    }
}
