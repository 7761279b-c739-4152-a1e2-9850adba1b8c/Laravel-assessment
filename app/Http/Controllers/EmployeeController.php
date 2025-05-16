<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // public function index()
    // {

    // }

    public function create()
    {
        return view('employees.create');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    public function store()
    {
        
    }

    public function edit(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
