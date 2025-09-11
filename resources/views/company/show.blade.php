
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
        <div class="mt-4"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Company employees') }}
                </div>
                @if ($employees->isEmpty())
                    <p class="p-2 mb-0">This company has no employees</p>
                @else
                    <x-employee-table :employees=$employees :return="$company->id"></x-employee-table>
                    {{ $employees->links() }}
                @endif
            </div>
            <div class="mt-2"></div>
        </div>
    </div>
</div>
@endsection