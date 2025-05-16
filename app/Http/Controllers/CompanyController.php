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

    public function store()
    {
        
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
