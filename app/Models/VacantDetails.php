<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacantDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'userInstitutional_id',
        'day',
        'vacant_time',
        'designated_office'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'userInstitutional_id', 'userInstitution_id');
    }
}
