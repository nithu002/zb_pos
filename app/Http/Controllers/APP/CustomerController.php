<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
     public function index()
    {
        $customers = Customer::all();
        return view('customer.view', compact('customers'));
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'province'   => 'required',
            'image'      => 'required',
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/customers', $imageName); // stores in storage/app/public/customers
            $validated['image'] = $imageName;
        }


        Customer::create($validated);
        return back()->with('success', 'Customer added successfully!');
    }

    public function show($id)
    {
        // $customer = Customer::findOrFail($id);
        // return response()->json($customer);
         $customer = Customer::find($id);

    if (!$customer) {
        return response()->json(['error' => 'Customer not found'], 404);
    }

    return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => "required,{$id}",
            'phone'      => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'province'   => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('customers', 'public');
        }

        $customer->update($data);
        return back()->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return back()->with('success', 'Customer deleted successfully!');
    }
}
