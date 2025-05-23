@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a Company') }}</div>

                <div class="card-body">
                    <form method="POST" action="/company" enctype="multipart/form-data">
                        @csrf

                        <x-form-input id="company-name" type="text" required autofocus>Company Name*</x-form-input>

                        <x-form-input id="email" type="email">Company Email</x-form-input>

                        <x-form-input id="logo" type="file" accept="image/*">Company Logo</x-form-input>

                        <x-form-input id="website" type="text">Company Website</x-form-input>
                        
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