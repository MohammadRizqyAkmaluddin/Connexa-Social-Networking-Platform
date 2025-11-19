<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSaved extends Model
{
    public $timestamps = false;
    protected $table = 'job_saved';
    protected $fillable = ['job_id', 'user_id'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
