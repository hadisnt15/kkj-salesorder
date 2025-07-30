<?php

namespace App\Http\Controllers;

use App\Imports\CustomerImport;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $test = Customer::latest()->paginate(5)->withQueryString();
        // $test = $test['CstName'];
        // dd($test);
        return view('customer.customer', [
            'title' => 'KKJSO - Customer', 
            'titleHeader' => 'Customer',
            'customer' => Customer::Filter(request(['search']))->latest()->paginate(15)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::get('https://api.goapi.io/regional/provinsi?api_key=ed454b81-676b-5805-dc4c-75b9c0a9');

        $state = $response->json()['data'] ?? [];

        return view('customer.customer_create', [
            'title' => 'KKJSO - Customer Create',
            'titleHeader' => 'Customer Create',
            'state' => $state
        ]);
    }

    public function getCities($stateId)
    {
        $response = Http::get('https://api.goapi.io/regional/kota', [
            'provinsi_id' => $stateId,
            'api_key' => 'ed454b81-676b-5805-dc4c-75b9c0a9'
        ]);

        $cities = $response->json()['data'] ?? [];

        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'CstCode' => 'required|max:10|unique:customer',
            'CstName' => 'required|max:150',
            'CstPerson' => 'required|max:150',
            'CstPhoneNum' => ['required','regex:/^(\+62|62|08)[0-9]{8,13}$/',],
            'CstState' => 'required',
            'CstCity' => 'required',
            'CstAddress' => 'required',
        ]);
        $validatedData['CstTermin'] = 0;
        $validatedData['CstLimit'] = 1;
        Customer::create($validatedData);
        return redirect('/customer')->with('success', 'New Customer Created!');
    }

    public function xlsx()
    {
        return Excel::download(new CustomerExport, 'customer.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import' => 'required|mimes:xlsx'
        ]);
        Excel::import(new CustomerImport, $request->file('import'));
        return redirect()->back()->with('success', 'Customer Imported!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cst = Customer::findOrFail($id);
        // dd($cst->CstCode);
        return view('customer.customer_edit', [
            'title' => 'KKJSO - Customer Edit',
            'titleHeader' => 'Customer Edit',
            'cst' => $cst
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $cst)
    {
        $validatedData = $request->validate([
            // 'CstCode' => 'required',
            'CstName' => 'required|max:150',
            'CstPerson' => 'required|max:150',
            'CstPhoneNum' => ['required','regex:/^(\+62|62|08)[0-9]{8,13}$/',],
            'CstState' => 'required',
            'CstCity' => 'required',
            'CstAddress' => 'required',
        ]);
        Customer::where('id', $cst->id)->update($validatedData);
        return redirect('/customer')->with('success', 'Customer Updated!');
    }

    public function delete($id)
    {
        $cst = Customer::findOrFail($id);
        // dd($cst->CstCode);
        return view('customer.customer_delete', [
            'title' => 'KKJSO - Customer Delete',
            'titleHeader' => 'Customer Delete',
            'cst' => $cst
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cst =  Customer::findOrFail($id);
        $cst->delete();
        return redirect('/customer')->with('success', 'Customer Deleted!');
    }
}
