<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWebsite extends Model
{
    protected $table = 'user_websites';
    protected $fillable = ['user_id', 'URL', 'website_type'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
