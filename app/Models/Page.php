<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'page_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['page_id', 'page_type', 'description', 'image'];

    public function companies()
    {
        return $this->hasMany(Company::class, 'page_id');
    }
}
