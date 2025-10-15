<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    use HasFactory;

    protected $table = 'user_educations';
    protected $primaryKey = ['user_id', 'major_id'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'company_id', 'major_id', 'start_date', 'end_date', 'GPA', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'major_id');
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class UserEducation extends Model
// {
//     protected $table = 'user_educations';
//     protected $primaryKey = 'edu_id';
//     public $incrementing = false;
//     public $timestamps = false;

//     protected $fillable = [
//        'edu_id', 'user_id', 'company_id', 'major_id', 'start_date', 'end_date',
//         'GPA', 'description', 'section_id'
//     ];

//     public function user()
//     {
//         return $this->belongsTo(User::class, 'user_id', 'user_id');
//     }

//     public function company()
//     {
//         return $this->belongsTo(Company::class, 'company_id', 'company_id');
//     }

//     public function major()
//     {
//         return $this->belongsTo(Major::class, 'major_id', 'major_id');
//     }

//     public function section()
//     {
//         return $this->belongsTo(Section::class, 'section_id', 'section_id');
//     }
// }
