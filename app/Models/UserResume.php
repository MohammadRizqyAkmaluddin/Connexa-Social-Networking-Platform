<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserResume extends Model
{
    protected $table = 'user_resumes';
    protected $primaryKey = 'resume_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','user_id');
    }
}
