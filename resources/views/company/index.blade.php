
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
        </div>
    </div>
</div>
@endsection