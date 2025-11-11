<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    protected $table = 'overviews';
    protected $primaryKey = 'overview_id';
    protected $fillable = ['company_id', 'overview'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
