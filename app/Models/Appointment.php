<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_type_id',
        'date_time',
        'duration',
    ];

    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class)
                    ->withPivot('status_id', 'notes')
                    ->withTimestamps();
    }
}
