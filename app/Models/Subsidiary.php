<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    protected $table = 'subsidiary';
    public $timestamps = false;

    protected $fillable = ['company_id', 'parent_id'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function parent()
    {
        return $this->belongsTo(Company::class, 'parent_id');
    }
}
