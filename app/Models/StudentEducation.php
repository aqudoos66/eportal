<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentEducation extends Model
{
    use HasFactory;

    // Explicitly specify correct table name
    protected $table = 'student_educations';

    protected $fillable = [
        'student_id',
        'degree',
        'institution',
        'field_of_study',
        'start_year',
        'end_year',
        'grade',
        'description',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
