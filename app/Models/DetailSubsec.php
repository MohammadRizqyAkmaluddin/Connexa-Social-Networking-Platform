<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSubsec extends Model
{
    protected $table = 'detail_subsec';
    protected $primaryKey = 'sub_section_id';
    public $timestamps = false;

    protected $fillable = ['job_id', 'sub_title'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function points()
    {
        return $this->hasMany(DetailPoint::class, 'sub_section_id');
    }
}
