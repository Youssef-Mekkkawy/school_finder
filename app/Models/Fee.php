<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id', 'academic_year', 'tuition_min', 'tuition_max',
        'transport_fees', 'currency', 'is_public',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
