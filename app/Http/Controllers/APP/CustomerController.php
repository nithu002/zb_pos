<?php

namespace App\Http\Controllers\App;
use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;


use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

// use Maatwebsite\Excel\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('app.customer.view', compact('customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'image' => 'required',

        ]);

        $customer = Customer::create($validated);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($image && $image->isValid()) {
                $extension = $image->getClientOriginalExtension();
                $baseName = Str::slug($request->first_name ?? 'customers');
                $filename = sprintf(
                    '%s_%s_%s.%s',
                    $baseName,
                    time(),
                    Str::random(6),
                    $extension
                );
                // Make sure the directory exists
                $uploadDir = public_path('storage/customers');
                File::ensureDirectoryExists($uploadDir, 0755, true);

                // Move the file to the directory
                $image->move($uploadDir, $filename);

                // Save the public path
                $customer->image = asset('storage/customers/' . $filename);
            }
        }

        $customer->save();

        // Handle image upload if exists
        // if ($request->hasFile('image')) {
        //     $image      = $request->file('image');
        //     $imageName  = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('public/customers', $imageName); // stores in storage/app/public/customers
        //     $validated['image'] = $imageName;
        // }


        // Customer::create($validated);
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

        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required' . $id,
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'province' => 'required',
        // ]);
        // $data = $request->only([
        //     'first_name',
        //     'last_name',
        //     'email',
        //     'phone',
        //     'address',
        //     'city',
        //     'province'
        // ]);

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

    // public function downloadPdf(Request $request)
    // {
    //     $ids = explode(',', $request->query('ids'));
    //     $customers = Customer::whereIn('id', $ids)->get();

    //     $pdf = Pdf::loadView('exports.customers-pdf', compact('customers'));
    //     return $pdf->download('selected-customers.pdf');
    // }

     public function downloadPdf(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->back()->with('error', 'No Customer selected.');
        }

        $customers = Customer::whereIn('id', $ids)->get();

        $pdf = Pdf::loadView('export.customers-pdf', compact('customers'));
        return $pdf->download('selected-customers.pdf');
    }


    // public function downloadExcel(Request $request)
    // {
    //     $ids = explode(',', $request->query('ids'));
    //     $customers = Customer::whereIn('id', $ids)->get();

    //     return Excel::download(new CustomersExport($customers), 'selected-customers.xlsx');
    // }

    public function downloadExcel(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->back()->with('error', 'No Customer selected.');
        }

        return Excel::download(new CustomersExport($ids), 'selected-customers.xlsx');
    }


}
