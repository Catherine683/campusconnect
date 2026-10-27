<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'course_code',
        'name',
        'description',
        'credit_units',
        'semester',
        'year_level',
        'department',
        'max_students',
        'status',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function registrations()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_registrations')
                    ->withPivot('status', 'grade')
                    ->withTimestamps();
    }

    public function getEnrolledCountAttribute(): int
    {
        return $this->registrations()->where('status', 'registered')->count();
    }

    public function getSlotsAvailableAttribute(): int
    {
        return $this->max_students - $this->enrolled_count;
    }
}
