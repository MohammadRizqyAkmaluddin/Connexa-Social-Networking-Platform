<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $table = 'employment';
    protected $primaryKey = 'employment_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['employment_id', 'employment_type'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employment_id');
    }

    public function experiences()
    {
        return $this->hasMany(UserExperience::class, 'employment_id');
    }
}
