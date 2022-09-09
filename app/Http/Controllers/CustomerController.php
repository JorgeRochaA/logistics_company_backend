<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function createCustomer(CustomerRequest $request)
    {
        $customer = [
            'id_customer' => $request->id_customer,
            'name' => $request->name,
            'lastName' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        $customerCreated = Customer::create($customer);

        if ($customerCreated) {
            return response()->json([
                "message" => "Customer created successfully."
            ], 200);
        } else {
            return response()->json([
                "message" => "There was an error creating the customer."
            ], 400);
        }
    }

    public function getCustomers()
    {
        $customers = Customer::all();

        return response()->json([
            "customers" => $customers
        ], 200);
    }
}
