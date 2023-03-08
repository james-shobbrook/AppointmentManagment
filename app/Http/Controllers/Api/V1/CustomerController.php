<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return CustomerResource::collection($customers);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone_number' => 'nullable',
        ]);

        $customer = Customer::create($validatedData);

        return new CustomerResource($customer);
    }

    public function show(Customer $customer)
    {
        $customer->load('appointments');

        return new CustomerResource($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers,email,' . $customer->id,
            'phone_number' => 'nullable',
        ]);

        $customer->update($validatedData);

        return new CustomerResource($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->appointments()->detach();
        $customer->delete();

        return response()->noContent();
    }
}
