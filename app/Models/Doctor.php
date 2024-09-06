<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact',
        'specialty',
        'qualifications',
        'address',
        'experience',
        'profile_image',
        'doctor_id'
    ];

    public function hospitals()
    {
        return $this->belongsToMany(User::class, 'doctor_hospital', 'doctor_id', 'hospital_id')
            ->where('type', 'hospital');
    }
}
