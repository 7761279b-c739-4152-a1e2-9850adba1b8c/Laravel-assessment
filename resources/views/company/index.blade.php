
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Companies') }}
                    <a href="/company/create" class="btn btn-primary">Create a Company</a>
                </div>

                <x-company-table :companies=$companies></x-company-table>
            </div>
            <div class="mt-2">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
