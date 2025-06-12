
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Company Info') }}
                    <a href="/company" class="btn btn-secondary">Back to Companies</a>
                </div>

                <x-company-info :company=$company />
            </div>
        </div>
    </div>
</div>
@endsection