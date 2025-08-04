<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('employee.employee', [
            'title' => 'KKJSO - Employee',
            'titleHeader' => 'Employee',
            'employee' => Employee::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userNotInEmployee = DB::table('users')
            ->leftJoin('employee', 'users.id', '=', 'employee.EmpUsrId')
            ->whereNull('employee.EmpUsrId')
            ->select('users.*')
            ->get();
        return view('employee.employee_create', [
            'title' => 'KKJSO - Employee Create',
            'titleHeader' => 'Employee Create',
            'user' => $userNotInEmployee
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'EmpCode' => 'required|unique:employee',
            'EmpUsrId' => 'required',
            'div' => 'required',
        ]);
        Employee::create($validatedData);
        return redirect('/employee')->with('success', 'New Employee Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
