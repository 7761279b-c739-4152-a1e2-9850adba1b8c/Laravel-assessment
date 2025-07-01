@props(['company'])

<tr class="align-middle">
    <td>
        @if($company->logo_filepath ?? false)
            <img src="/storage/{{ $company->logo_filepath }}" style="height: 32px; width: auto; aspect-ratio: auto;" />
        @endif
    </td>
    <td>
        <h3 style="font-size: 1.25rem">{{ $company->name }}</h3>
    </td>
    <td>
        <p> {!! $company->email ? str_replace(".", "<wbr>.", str_replace("@", "<wbr>@", htmlspecialchars($company->email))) : 'none' !!}</p>
    </td>
    <td>
        @if($company->website)
            <p><a class="m-0" href="{{ $company->website }}" target="_blank">{!! str_replace(".", "<wbr>.", htmlspecialchars(str_replace("https://", "", $company->website))) !!}</a></p>
        @else
            <p>none</p>
        @endif
    </td>
    <td style="text-align: right">
        <div><a href="/company/{{ $company->id }}" class="btn btn-primary">View Company</a></div>
    </td>
</tr>
