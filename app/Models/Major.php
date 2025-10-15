<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $primaryKey = 'major_id';
    public $incrementing = true;

    protected $fillable = ['company_id', 'major'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'major_id');
    }
}
