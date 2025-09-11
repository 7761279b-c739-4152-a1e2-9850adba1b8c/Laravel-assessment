
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    {{ __('Companies') }}
                    <x-table-sort :order=$order />
                    <a href="/company/create" class="btn btn-primary" style="margin-left: auto">Create a Company</a>
                </div>

                <x-company-table :companies=$companies></x-company-table>
            </div>
            <div class="mt-2"></div>
            {{ $companies->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection
