<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessManagement extends Model
{
    protected $table = 'access_management';
    public $timestamps = false;

    protected $fillable = ['company_id', 'user_id'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
