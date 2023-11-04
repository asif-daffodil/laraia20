<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view("employees.all", compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("employees.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required | min:3 | regex:/^[a-zA-Z. ]+$/u",
            "email" => "required | email | unique:employees",
            "gender"=> "required",
            "phone" => "required",
            "city" => "required | string",
        ],[
            "name.required"=> "Please enter your name",
            "name.min"=> "Name must be at least 3 characters",
            "name.regex"=> "Invalid name",
            "email.required"=> "Please enter your email",
            "email.email"=> "Invalid email",
            "email.unique"=> "This email has been already taken",
            "phone.required"=> "Please enter your phone number",
            "city.required"=> "Please enter your city",
            "city.string"=> "Invalid city name",
        ]);
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->phone = $request->phone;
        $employee->city = $request->city;
        $employee->save();
        return redirect()->route('employee.add')->with('success', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view("employees.edit", compact("employee"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            "name" => "required | min:3 | regex:/^[a-zA-Z. ]+$/u",
            "email" => [
                'required',
                'email',
                Rule::unique('employees')->ignore($employee->email),
            ],
            "gender"=> "required",
            "phone" => "required",
            "city" => "required | string",
        ],[
            "name.required"=> "Please enter your name",
            "name.min"=> "Name must be at least 3 characters",
            "name.regex"=> "Invalid name",
            "email.required"=> "Please enter your email",
            "email.email"=> "Invalid email",
            "email.unique"=> "This email has been already taken",
            "phone.required"=> "Please enter your phone number",
            "city.required"=> "Please enter your city",
            "city.string"=> "Invalid city name",
        ]);
        $employee = Employee::find($employee->id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->phone = $request->phone;
        $employee->city = $request->city;
        $employee->save();
        return redirect()->route('employee.add')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
