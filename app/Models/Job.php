<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $primaryKey = 'job_id';
    protected $table = 'jobs';


    protected $fillable = [
        'company_id', 'title', 'employment_id', 'mode_id', 'job_details',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
    public function employment()
    {
        return $this->belongsTo(Employment::class, 'employment_id', 'employment_id');
    }
    public function mode()
    {
        return $this->belongsTo(Mode::class, 'mode_id', 'mode_id');
    }
    public function salary()
    {
        return $this->hasOne(JobSalary::class, 'job_id', 'job_id');
    }
    public function applicant()
    {
        return $this->hasMany(Applicant::class, 'job_id', 'job_id');
    }
    public function detailSubsecs()
    {
        return $this->hasMany(DetailSubsec::class, 'job_id', 'job_id');
    }
    public function jobsaved()
    {
        return $this->hasMany(JobSaved::class, 'job_id', 'job_id');
    }
    public function interested()
    {
        return $this->hasMany(Interested::class, 'job_id', 'job_id');
    }
}
