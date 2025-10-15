<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    protected $table = 'modes';
    protected $primaryKey = 'mode_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['mode_id', 'mode'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'mode_id');
    }

    public function experiences()
    {
        return $this->hasMany(UserExperience::class, 'mode_id');
    }
}
