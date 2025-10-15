<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPoint extends Model
{
    protected $table = 'detail_point';
    protected $primaryKey = 'detail_point_id';
    public $timestamps = false;

    protected $fillable = ['sub_section_id', 'point'];

    public function subsection()
    {
        return $this->belongsTo(DetailSubsec::class, 'sub_section_id');
    }
}
