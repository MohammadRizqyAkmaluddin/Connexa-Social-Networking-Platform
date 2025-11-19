<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interested extends Model
{
    public $timestamps = false;
    protected $table = 'interested';
    protected $fillable = ['company_id', 'user_id'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
