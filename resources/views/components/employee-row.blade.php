@props(['employee'])

<tr class="align-middle">
    <td>
        <h3 style="font-size: 1.25rem">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
    </td>
    <td>
        <p>
            @if (isset($employee->company->id))
                <a href="/company/{{ $employee->company->id }}">{{ $employee->company->name }}</a>
            @endif
        </p>
    </td>
    <td>
        <p>{!! $employee->email ? str_replace(".", "<wbr>.", str_replace("@", "<wbr>@", htmlspecialchars($employee->email))) : 'none' !!}<br>{{ $employee->phone ?? '' }}</p>
    </td>
    <td style="text-align: right">
        <div><a href="/employee/{{ $employee->id }}" class="btn btn-primary">View Employee</a></div>
    </td>
</tr>