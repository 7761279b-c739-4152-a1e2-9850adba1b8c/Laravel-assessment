
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>

                <x-company-info :company=$company />

                <a href="/company/{{ $company->id }}/edit" class="btn">Edit Company</a>
            </div>
        </div>
    </div>
</div>
@endsection