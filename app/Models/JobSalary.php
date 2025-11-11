<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSalary extends Model
{
    protected $table = 'job_salary';
    protected $primaryKey = 'job_id';

    protected $fillable = ['job_id', 'min_salary', 'max_salary'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }
}
