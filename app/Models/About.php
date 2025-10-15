<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    public $timestamps = false;

    protected $fillable = ['user_id', 'description', 'section_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
