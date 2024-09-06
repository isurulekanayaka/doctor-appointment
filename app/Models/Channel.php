<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_hospital_id', 
        'date', 
        'start_time', 
        'end_time', 
        'patient_channel_time_avg', 
        'price'
    ];

    // Relationship with DoctorHospital
    public function doctorHospital()
    {
        return $this->belongsTo(DoctorHospital::class);
    }
}
