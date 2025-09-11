
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
                    @if (is_null($selected_company))
                        <a href="/employee" class="btn btn-secondary">Back to Employees</a>
                    @else
                        <a href="/company/{{ $selected_company->id }}" class="btn btn-secondary">Back to {{ $selected_company->name }}</a>
                    @endif
                </div>

                <x-employee-info :employee=$employee :return="is_null($selected_company) ? '' : $selected_company->id" />

            </div>
        </div>
    </div>
</div>
@endsection