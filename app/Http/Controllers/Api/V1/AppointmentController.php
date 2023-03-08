<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class AppointmentController extends Controller
{
    public function index()
    {
        $cacheKey = 'appointments_index';

        return Cache::remember($cacheKey, 60, function () {
            $appointments = Appointment::with(['appointmentType', 'customers'])->get();
            return AppointmentResource::collection($appointments);
        });
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'appointment_type_id' => 'required',
            'date_time' => 'required',
            'duration' => 'required',
            'customer_ids' => 'required|array',
        ]);

        $appointment = Appointment::create($validatedData);

        $appointment->customers()->attach($validatedData['customer_ids']);

        return new AppointmentResource($appointment);
    }

    public function show(Appointment $appointment)
    {
        $appointment->load('appointmentType', 'customers');

        return new AppointmentResource($appointment);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'appointment_type_id' => 'required',
            'date_time' => 'required',
            'duration' => 'required',
            'customer_ids' => 'required|array',
        ]);

        $appointment->update($validatedData);

        $appointment->customers()->sync($validatedData['customer_ids']);

        return new AppointmentResource($appointment);
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->customers()->detach();
        $appointment->delete();

        return response()->noContent();
    }
}
