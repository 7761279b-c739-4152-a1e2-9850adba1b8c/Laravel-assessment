
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                @foreach($companies as $company)
                    <x-company-info :company=$company :full=false />
                @endforeach()

            </div>
            <div style="display: flex; justify-content: right; margin-top: 20px;">
                <a href="/company/create" class="btn btn-primary">Create a Company</a>
            </div>
        </div>
    </div>
</div>
@endsection