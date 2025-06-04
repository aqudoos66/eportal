<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
        'start_date',
        'end_date',
        'type',
        'trainer_id',
    ];

protected $casts = [
    'start_date' => 'datetime',
    'end_date' => 'datetime',
];



    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
