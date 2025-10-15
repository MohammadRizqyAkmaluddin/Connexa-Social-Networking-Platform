<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $primaryKey = 'job_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'company_id', 'title', 'description', 'employment_id', 'mode_id',
        'sallary', 'posted_date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function employment()
    {
        return $this->belongsTo(Employment::class, 'employment_id');
    }

    public function mode()
    {
        return $this->belongsTo(Mode::class, 'mode_id');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'job_id');
    }

    public function detailSubsecs()
    {
        return $this->hasMany(DetailSubsec::class, 'job_id');
    }
}
