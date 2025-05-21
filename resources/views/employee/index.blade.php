
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="space-y-4">
                    @foreach($employees as $employee)
                        <x-employee-info :employee=$employee :full=false />
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</div>
@endsection