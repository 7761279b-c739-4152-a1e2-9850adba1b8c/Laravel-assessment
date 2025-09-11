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

    public function create(Request $request)
    {
        if (Auth::guest()) {return redirect('/login');}
        $company_names = Company::get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE)->pluck('name');
        $selected_company = $request->query('company') ? Company::findOrFail($request->query('company')) : null;
        return view('employee.create', ['company_names' => $company_names, 'selected_company' => $selected_company]);
    }

    public function show(Request $request, Employee $employee)
    {
        if (Auth::guest()) {return redirect('/login');}

        $selected_company = $request->query('company') ? Company::findOrFail($request->query('company')) : null;
        return view('employee.show', ['employee' => $employee, 'selected_company' => $selected_company]);
    }

    public function store(Request $request)
    {
        if (Auth::guest()) {return redirect('/login');}

        $attributes = $request->validate([
            'first-name' => ['required'],
            'last-name' => ['required'],
            'company' => ['exists:companies,name'],
            'email' => ['nullable'],
            'phone' => ['nullable'],
            'return' => ['nullable']
        ]);

        $company = Company::where('name', $attributes['company'])->firstOrFail();

        Employee::create([
            'first_name' => $attributes['first-name'],
            'last_name' => $attributes['last-name'],
            'company_id' => $company['id'] ?? null,
            'email' => $attributes['email'] ?? null,
            'phone' => $attributes['phone'] ?? null
        ]);

        if ($attributes['return'] ?? '' != '') {

            return redirect('/company/' . $attributes['return']);
        }
        return redirect('/employee');
    }

    public function edit(Request $request, Employee $employee)
    {
        if (Auth::guest()) {return redirect('/login');}

        $company_names = Company::get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE)->pluck('name');
        $return = $request->query('company') ?? '';
        return view('employee.edit', ['employee' => $employee, 'company_names' => $company_names, 'return' => $return]);
    }

    public function update(Request $request, string $id)
    {
        if (Auth::guest()) {return redirect('/login');}

        $attributes = $request->validate([
            'first-name' => ['required'],
            'last-name' => ['required'],
            'company' => ['exists:companies,name'],
            'email' => ['nullable'],
            'phone' => ['nullable'],
            'return' => ['nullable']
        ]);
        $employee = Employee::findOrFail($id);

        $employee->first_name = $attributes['first-name'];
        $employee->last_name = $attributes['last-name'];
        $company = Company::where('name', $attributes['company'])->firstOrFail();
        $employee->company_id = $company['id'];
        $employee->email = $attributes['email'] ?? null;
        $employee->phone = $attributes['phone'] ?? null;
        $employee->save();

        if ($attributes['return'] ?? '' != '') {

            return redirect('/employee/' . $employee->id .'?company=' . $attributes['return']);
        }
        return redirect('/employee/' . $employee->id);
    }

    public function destroy(Request $request, string $id)
    {   
        if (Auth::guest()) {return redirect('/login');}

        Employee::findOrFail($id)->delete();


        $return = $request->query('company') ?? '';
        if ($return == '') {
            return redirect('/employee');
        } else {
            return redirect('/company/' . $return);
        }
    }
}
