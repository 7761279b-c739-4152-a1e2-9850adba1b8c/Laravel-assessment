<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // public function index()
    // {

    // }

    public function create()
    {
        return view('company.create');
    }

    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'company-name' => ['required', 'unique:companies,name'],
            'email' => ['nullable', 'email', 'unique:companies,name'],
            'logo' => ['nullable', 'image', 'dimensions:min_width=100,min_height=100'],
            'website' => ['nullable', 'url']
        ]);
        if ($request['logo'] ?? false) {
            $filepath = $request['logo']->store('logos');
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
        return view('company.edit', ['company' => $company]);
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
