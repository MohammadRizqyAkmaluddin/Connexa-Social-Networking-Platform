<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRole extends Model
{
    protected $table = 'company_roles';
    public $timestamps = false;

    protected $fillable = ['user_id', 'company_id', 'role'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
