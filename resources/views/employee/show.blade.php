
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

                <x-employee-info :employee=$employee :full=true />

            </div>
        </div>
    </div>
</div>
@endsection