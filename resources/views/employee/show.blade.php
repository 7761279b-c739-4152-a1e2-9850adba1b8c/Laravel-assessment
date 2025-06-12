
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="display: flex; justify-content: left; margin-bottom: 10px;">
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Employee Info') }}
                    <a href="/employee" class="btn">Back to Employees</a>
                </div>

                <x-employee-info :employee=$employee />

            </div>
        </div>
    </div>
</div>
@endsection