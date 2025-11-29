<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicants';

    protected $fillable = ['user_id', 'job_id', 'resume_file', 'portfolio_file', 'cover_letter','status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }
}

