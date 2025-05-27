
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                    <div class="space-y-4">
                        @foreach($employees as $employee)
                            <x-employee-info :employee=$employee :full=false />
                        @endforeach()
                    <div style="display: flex; justify-content: right; margin-top: 20px;">
                        <a href="/employee/create" class="btn btn-primary">Create an employee</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
@endsection