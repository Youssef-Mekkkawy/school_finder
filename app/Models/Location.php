<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['area', 'city', 'compound', 'address', 'latitude', 'longitude'];

    public function school()
    {
        return $this->hasOne(School::class);
    }
}
