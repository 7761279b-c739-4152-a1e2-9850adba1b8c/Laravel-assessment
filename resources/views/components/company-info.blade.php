@props(['company'])

<div class="card-body">
    @if($company->logo_filepath ?? false)
        <div>
            <img src="/storage/{{ $company->logo_filepath }}" style="height: 64px; width: auto; aspect-ratio: auto;" />
        </div>
    @endif
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
    <a class="btn btn-primary" href="/employee/create?company={{ $company->id }}" class="btn btn-primary">Add Employee</a>
</div>
