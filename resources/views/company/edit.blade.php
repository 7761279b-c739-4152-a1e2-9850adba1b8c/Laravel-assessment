@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit a Company') }}</div>

                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="/company/{{ $company->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            
                            @if (session('error'))
                                <div class="mb-3">
                                    <p class="invalid-feedback" style="display: inline"><strong>{{ session('error') }}</strong></p>
                                </div>
                            @endif

                            <x-form-input id="company-name" type="text" required autofocus value="{{ $company->name }}">Company Name*</x-form-input>

                            <x-form-input id="email" type="email" value="{{ $company->email ?? '' }}">Company Email</x-form-input>

                            <x-form-input id="logo" type="file" accept="image/*">Company Logo</x-form-input>

                            <x-form-input id="website" type="text" value="{{ $company->website ?? '' }}">Company Website</x-form-input>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <a href="/company/{{ $company->id }}" class="btn">
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
                        <form method="POST" action="/company/{{ $company->id }}" id="delete-form">
                            @csrf
                            @method('DELETE')
                        </form>
                        <script>
                            document.getElementById('delete-form').addEventListener('submit', event => {
                                if (!confirm('Are you sure you want to delete this company?')) {
                                    event.preventDefault();
                                }
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection