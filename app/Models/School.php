<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $appends = ['rating', 'review_count'];

    protected $fillable = [
        'name', 'type_id', 'location_id', 'email', 'phone',
        'website', 'facebook', 'instagram', 'age_min', 'age_max',
        'class_size_avg', 'num_students', 'foreign_ratio', 'transport', 'is_active',
        'is_school_of_month', 'featured_badge_text', 'featured_until',
    ];

    public function type()
    {
        return $this->belongsTo(SchoolType::class, 'type_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function curricula()
    {
        return $this->belongsToMany(Curriculum::class, 'school_curricula');
    }

    public function getRatingAttribute(): float
    {
        return round($this->reviews()->where('is_approved', true)->avg('rating') ?? 0, 1);
    }

    public function getReviewCountAttribute(): int
    {
        return $this->reviews()->where('is_approved', true)->count();
    }
}
