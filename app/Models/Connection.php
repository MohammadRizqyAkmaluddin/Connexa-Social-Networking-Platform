<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $table = 'connections';
    public $timestamps = false;

    protected $fillable = ['user_id', 'user_target', 'status', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function target()
    {
        return $this->belongsTo(User::class, 'user_target');
    }
}
