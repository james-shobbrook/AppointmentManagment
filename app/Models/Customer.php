<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
    ];

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class)
                    ->withPivot('status_id', 'notes')
                    ->withTimestamps();
    }
}
