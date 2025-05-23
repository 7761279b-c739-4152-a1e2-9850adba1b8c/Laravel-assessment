
<?php
use App\Models\Company;
$companies = Company::latest()->simplePaginate(3);
use App\Models\Employee;
$employees = Employee::latest()->simplePaginate(3);
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="m-4"></div>
            <div class="card">
                <div class="card-header">{{ __('Latest employees') }}</div>

                <div class="card-body">
                    <div class="space-y-4">
                        @foreach($employees as $employee)
                            <x-employee-info :employee=$employee :full=false />
                        @endforeach()
                    </div>
                    <div style="display: flex; justify-content: right; margin-top: 20px;">
                        <a href="/employee" class="btn btn-secondary">All employees</a>
                    </div>
                </div>
            </div>
            <div class="m-4"></div>
            <div class="card">
                <div class="card-header">{{ __('Latest companies') }}</div>

                <div class="card-body">
                    @foreach($companies as $company)
                        <x-company-info :company=$company :full=false />
                    @endforeach()
                    <div style="display: flex; justify-content: right; margin-top: 20px;">
                        <a href="/company" class="btn btn-secondary">All companies</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
