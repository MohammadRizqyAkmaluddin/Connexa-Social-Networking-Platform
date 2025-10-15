<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCertificate extends Model
{
    protected $table = 'user_certificate';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'company_id', 'title', 'skill', 'description',
        'issue_date', 'credential', 'image', 'section_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
