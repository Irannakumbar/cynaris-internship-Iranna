<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Course extends Model
{
    protected $fillable = [
        'name',
        'course_code',
        'description',
        'duration_months',
        'fee',
    ];

public function students()
{
    return $this->belongsToMany(Student::class)
        ->withPivot('enrolled_at', 'status')
        ->withTimestamps();
}

}