<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = ['user_id', 'job_id', 'resume_file', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}

