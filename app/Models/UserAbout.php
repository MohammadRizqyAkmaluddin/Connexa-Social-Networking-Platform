<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAbout extends Model
{
    protected $table = 'user_about';

    protected $fillable = ['user_id','about'];

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
