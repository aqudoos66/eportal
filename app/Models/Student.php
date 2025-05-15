<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'registration_date', 'address', 'dob', 'gender'
    ];

    public function educations()
    {
        return $this->hasMany(StudentEducation::class);
    }
}
