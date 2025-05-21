<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'expertise',
        'cnic',
    ];

    public function educations()
    {
        return $this->hasMany(TrainerEducation::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
