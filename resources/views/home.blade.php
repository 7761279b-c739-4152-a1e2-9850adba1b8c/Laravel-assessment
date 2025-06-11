
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
        <div class="col-md-10">
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Latest employees') }}
                    <a href="/employee" class="btn btn-secondary">All employees</a>
                </div>

                <x-employee-table :employees=$employees></x-employee-table>
            </div>
            <div class="m-4"></div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Latest companies') }}
                    <a href="/company" class="btn btn-secondary">All companies</a>
                </div>

                <x-company-table :companies=$companies></x-company-table>
            </div>
        </div>
    </div>
</div>
@endsection
