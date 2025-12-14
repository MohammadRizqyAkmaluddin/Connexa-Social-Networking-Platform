<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileView extends Model
{
    protected $table = 'profile_views';
    public $timestamps = false;
    protected $fillable = ['user_id', 'user_target'];

    public function userSender()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function userTarget()
    {
        return $this->belongsTo(User::class, 'user_target', 'user_id');
    }
}
