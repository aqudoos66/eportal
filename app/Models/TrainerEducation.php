<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'degree',
        'institution',
        'field_of_study',
        'start_year',
        'end_year',
        'grade',
        'description',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
