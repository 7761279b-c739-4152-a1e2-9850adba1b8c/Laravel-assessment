
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="display: flex; justify-content: left; margin-bottom: 10px;">
                <a href="/company" class="btn">Back to Companies</a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>

                <div class="card-body">
                    <x-company-info :company=$company />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection