<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('manager.employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('manager.employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data = array_merge($request->validated(), ['user_id' => auth()->user()->id]);
        Employee::create($data);

        return to_route('employees.index')->with('success', 'Employee is recorded successfully!');
    }

    public function show(Employee $employee)
    {
        return view('manager.employees.show', ['employee' => $employee]);
    }

    public function edit(Employee $employee)
    {
        return view('manager.employees.edit', ['employee' => $employee]);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return to_route('employees.index')->with('success', 'Employee is updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return to_route('employees.index')->with('success', 'Employee is deleted successfully!');
    }
}
