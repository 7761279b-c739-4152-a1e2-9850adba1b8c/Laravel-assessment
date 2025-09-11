<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guest()) {return redirect('/login');}

        $order = $request->query('order') ?? 'nameasc';
        $sortname = 'name'; $sortdir = 'asc';
        if ($order == 'nameasc') {
            $sortname = 'name';
            $sortdir = 'asc';
        } else if ($order == 'namedesc') {
            $sortname = 'name';
            $sortdir = 'desc';
        } else if ($order == 'timeasc') {
            $sortname = 'created_at';
            $sortdir = 'asc';
        } else if ($order == 'timedesc') {
            $sortname = 'created_at';
            $sortdir = 'desc';
        }

        $companies = Company::orderBy($sortname, $sortdir)->orderBy('name', 'asc')->paginate(10);
        return view('company.index', [
            'companies' => $companies,
            'order' => $order
        ]);
    }

    public function create()
    {
        if (Auth::guest()) {return redirect('/login');}

        return view('company.create');
    }

    public function show(Company $company)
    {
        if (Auth::guest()) {return redirect('/login');}

        $employees = Employee::where('company_id', $company->id)->orderBy('created_date', 'desc')->paginate(6);
        return view('company.show', ['company' => $company, 'employees' => $employees]);
    }

    public function store(Request $request)
    {
        if (Auth::guest()) {return redirect('/login');}

        $attributes = Validator::validate($request->all(), [
            'company-name' => ['required', 'unique:companies,name'],
            'email' => ['nullable', 'email', 'unique:companies,name'],
            'logo' => ['nullable', 'image', 'dimensions:min_width=100,min_height=100'],
            'website' => ['nullable', 'url']
        ], [
            'logo.dimensions' => ['The logo field has invalid image dimensions (must be at least 100x100).']
        ]);
        if ($attributes['logo'] ?? false) {
            $filepath = $attributes['logo']->store('logos');
        }
        Company::create([
            'name' => $attributes['company-name'],
            'email' => $attributes['email'] ?? null,
            'logo_filepath' => $filepath ?? null,
            'website' => $attributes['website'] ?? null,
        ]);

        return redirect('/company');
    }

    public function edit(Company $company)
    {
        if (Auth::guest()) {return redirect('/login');}

        return view('company.edit', ['company' => $company]);
    }

    public function update(Request $request, string $id)
    {
        if (Auth::guest()) {return redirect('/login');}

        $attributes = Validator::validate($request->all(), [
            'company-name' => ['required', 'unique:companies,name,'.$id],
            'email' => ['nullable', 'email', 'unique:companies,name,'.$id],
            'logo' => ['nullable', 'image', 'dimensions:min_width=100,min_height=100'],
            'website' => ['nullable', 'url']
        ], [
            'logo.dimensions' => ['The logo field has invalid image dimensions (must be at least 100x100).']
        ]);
        $company = Company::findOrFail($id);

        $company->name = $attributes['company-name'];
        $company->email = $attributes['email'];
        if ($attributes['logo'] ?? false) {
            $filepath = $attributes['logo']->store('logos');
            $company->logo_filepath = $filepath;
        }
        $company->website = $attributes['website'];
        $company->save();

        return redirect('/company/' . $company->id);
        
    }

    public function destroy(string $id)
    {
        if (Auth::guest()) {return redirect('/login');}

        $company = Company::findOrFail($id);

        if ($company->employees()->count() > 0) {
            return redirect('/company/' . $id . '/edit')->with('error', 'Unable to delete company. Please remove all employees first.');
        }

        $company->delete();

        return redirect('/company');
    }
}
