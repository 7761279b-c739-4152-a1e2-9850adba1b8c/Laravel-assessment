@props(['company'])

@if($company->logo_filepath ?? false)
    <img src="/storage/{{ $company->logo_filepath }}" style="aspect-ratio: auto;" />
@endif
<div class="card-body">
    <h3 class="card-title">{{ $company->name }}</h3>
    @if ($company->email ?? false)
        <p class="card-text">Email: {{ $company->email }}</p>
    @endif
    @if ($company->website ?? false)
        <p class="card-text">Website: <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
    @else
        <p class="card-text">Website: none</p>
    @endif
    <a class="btn btn-primary" href="/company/{{ $company->id }}/edit" class="btn btn-primary">Edit Company</a>
</div>
