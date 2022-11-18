<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarks extends Model
{
    use HasFactory;

    protected $fillable = [
        'requests_id',
        'faculty_id',
        'student_id',
        'remarks',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'faculty_id', 'userInstitution_id');
    }

    public function requests()
    {
        return $this->belongsTo(Requests::class, 'requests_id', 'id');
    }
}
