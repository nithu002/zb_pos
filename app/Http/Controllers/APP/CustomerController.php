<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
     public function index()
    {
        $customers = Customer::all();
        return view('customer.view', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'province'   => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('customers', 'public');
        }

        Customer::create($data);
        return back()->with('success', 'Customer added successfully!');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
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
