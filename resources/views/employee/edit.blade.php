@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit an employee') }}</div>

                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="/employee/{{ $employee->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            

                            <x-form-input id="first-name" type="text" value="{{ $employee->first_name }}" required autofocus>First Name</x-form-input>

                            <x-form-input id="last-name" type="text" value="{{ $employee->last_name }}">Last Name</x-form-input>

                            <x-form-input id="company" type="text" value="{{ $employee->company ? $employee->company->name : '' }}">Company</x-form-input>

                            <x-form-input id="email" type="text" value="{{ $employee->email ?? '' }}">Email</x-form-input>

                            <x-form-input id="phone" type="text" value="{{ $employee->phone ?? '' }}">Phone</x-form-input>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <a href="/employee/{{ $employee->id }}" class="btn">
                                        {{ __('Cancel') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <button type="submit" class="btn btn-danger" form="delete-form">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="/employee/{{ $employee->id }}" id="delete-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection