
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="display: flex; justify-content: left; margin-bottom: 10px;">
                <a href="/employee" class="btn">Back to Employees</a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Employee') }}</div>

                <div class="card-body">
                    <x-employee-info :employee=$employee />
                </div>

            </div>
        </div>
    </div>
</div>
@endsection