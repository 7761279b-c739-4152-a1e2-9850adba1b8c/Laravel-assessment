
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Company Info') }}
                    <a href="/company" class="btn btn-secondary">Back to Companies</a>
                </div>

                <x-company-info :company=$company />
            </div>
        </div>
        @if (!$employees->isEmpty())
        <div class="mt-4"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Company employees') }}
                </div>

                <x-employee-table :employees=$employees></x-employee-table>
            </div>
            <div class="mt-2"></div>
            {{ $employees->links() }}
        </div>
        @endif
    </div>
</div>
@endsection