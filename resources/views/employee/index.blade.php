
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Employees') }}
                    <a href="/employee/create" class="btn btn-primary">Create an employee</a>
                </div>

                <x-employee-table :employees=$employees></x-employee-table>
            </div>
            <div class="mt-2"></div>
            {{ $employees->links() }}
        </div>
    </div>
</div>
@endsection
