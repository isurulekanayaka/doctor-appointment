<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorHospital extends Model
{
    use HasFactory;

    protected $table = 'doctor_hospital';

    protected $fillable = ['doctor_id', 'hospital_id'];

    // Define the relationship to the Doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    // Define the relationship to the Hospital (User) model
    public function hospital()
    {
        return $this->belongsTo(User::class, 'hospital_id');
    }
}
