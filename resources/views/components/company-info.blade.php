@props(['company', 'full'])

<div style="border: 1px solid grey; display: block; padding: 4px; overflow-x: hidden;">
    <div style="display: flex; flex-direction: row; justify-content: space-between; margin-right: 20px;">
        <h2>{{ $company->name }}</h2>
        @if($company->logo_filepath ?? false)
            <img src="/{{ $company->logo_filepath }}" style="height: 32px; width: auto; aspect-ratio: auto;" />
        @endif
    </div>
    <div style="display: flex; justify-content: space-between;">
        <div style="display: flex; flex-direction: row; gap: 5%; flex-basis:50%">
            <p class="m-0">Contact: {{ $company->email ?? 'none'}}</p>
            @if($company->website)
                <p class="m-0">Website: <a class="m-0" href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            @else
                <p class="m-0">Website: none</p>
            @endif
        </div>
        @if($full)
            <div><a href="/company/{{ $company->id }}/edit" class="btn btn-primary">Edit Company</a>
        @else
            <div><a href="/company/{{ $company->id }}" class="btn btn-primary">View Company</a></div>
        @endif
    </div>
</div>
