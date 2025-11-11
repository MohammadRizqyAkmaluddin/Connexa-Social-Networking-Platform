<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    protected $table = 'subsidiary';
    public $timestamps = false;

    protected $fillable = ['company_id', 'parent_id'];

    public function parentCompany()
    {
        return $this->belongsTo(Company::class, 'parent_id', 'company_id');
    }

    public function childCompany()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
