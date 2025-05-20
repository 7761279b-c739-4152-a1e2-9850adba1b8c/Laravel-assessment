@props(['company'])

<div class="row mb-3">
    <h2><a href="/company/{{ $company['id'] }}">{{ $company['name'] }}</a></h2>
    @if($company['logo_filepath'] ?? false)
    <img src="/{{ $company['logo_filepath'] }}" style="height: 20px; width: auto; aspect-ratio: auto;" />
    @endif
</div>
