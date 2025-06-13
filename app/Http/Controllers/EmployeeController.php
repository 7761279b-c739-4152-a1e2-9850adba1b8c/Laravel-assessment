<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {return redirect('/login');}

        $employees = Employee::latest()->paginate(10);
        return view('employee.index', [
            'employees' => $employees
        ]);
    }

    public function create()
    {
        if (Auth::guest()) {return redirect('/login');}

        return view('employee.create');
    }

    public function show(Employee $employee)
    {
        if (Auth::guest()) {return redirect('/login');}

        return view('employee.show', ['employee' => $employee]);
    }

    public function store(Request $request)
    {
        if (Auth::guest()) {return redirect('/login');}

        $attributes = $request->validate([
            'first-name' => ['required'],
            'last-name' => ['required'],
            'company' => ['nullable', 'exists:companies,name'],
            'email' => ['nullable'],
            'phone' => ['nullable']
        ]);

        if ($attributes['company'] ?? false) {
            $company = Company::where('name', $attributes['company'])->firstOrFail();
        }

        Employee::create([
            'first_name' => $attributes['first-name'],
            'last_name' => $attributes['last-name'],
            'company_id' => $company['id'] ?? null,
            'email' => $attributes['email'] ?? null,
            'phone' => $attributes['phone'] ?? null
        ]);

        return redirect('/employee');
    }

    public function edit(Employee $employee)
    {
        if (Auth::guest()) {return redirect('/login');}

        return view('employee.edit', ['employee' => $employee]);
    }

    public function update(Request $request, string $id)
    {
        if (Auth::guest()) {return redirect('/login');}

        $attributes = $request->validate([
            'first-name' => ['required'],
            'last-name' => ['required'],
            'company_id' => ['nullable', 'exists:companies,name'],
            'email' => ['nullable'],
            'phone' => ['nullable']
        ]);
        $employee = Employee::findOrFail($id);

        $employee->first_name = $attributes['first-name'];
        $employee->last_name = $attributes['last-name'];
        if ($attributes['company'] ?? false) {
            $company = Company::where('name', $attributes['company'])->firstOrFail();
            $employee->company_id = $company['id'];
        }
        $employee->email = $attributes['email'] ?? null;
        $employee->phone = $attributes['phone'] ?? null;
        $employee->save();

        return redirect('/employee/' . $employee->id);
    }

    public function destroy(string $id)
    {   
        if (Auth::guest()) {return redirect('/login');}

        Employee::findOrFail($id)->delete();

        return redirect('/employee');
    }
}
