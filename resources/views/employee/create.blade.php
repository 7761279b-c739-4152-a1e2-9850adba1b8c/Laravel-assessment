@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create an Employee') }}</div>

                <div class="card-body">
                    <form method="POST" action="/employee" enctype="multipart/form-data">
                        @csrf

                        <x-form-input id="first-name" type="text" required autofocus>First Name</x-form-input>

                        <x-form-input id="last-name" type="text">Last Name</x-form-input>

                        <x-form-input id="company" type="text">Company</x-form-input>

                        <x-form-input id="email" type="text">Email</x-form-input>

                        <x-form-input id="phone" type="text">Phone</x-form-input>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection