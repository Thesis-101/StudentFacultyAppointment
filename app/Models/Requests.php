<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacant_id',
        'requesitor_id',
        'faculty_id',
        'request_type',
        'attendee_type',
        'day',
        'time',
        'date',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'faculty_id', 'userInstitution_id');
    }

    public function vacantDetails()
    {
        return $this->belongsTo(VacantDetails::class, 'vacant_id', 'id');
    }

    public function students()
    {
        return $this->belongsTo(User::class, 'requesitor_id', 'id');
    }

    public function remarks()
    {
        return $this->hasOne(Remarks::class);
    }
}
