@props(['employee', 'return' => ''])

<tr class="align-middle">
    <td>
        <p>{{ $employee->first_name }} {{ $employee->last_name }}</p>
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
        @if ($return == '')
            <div><a href="/employee/{{ $employee->id }}" class="btn btn-primary">View Employee</a></div>
        @else
            <div><a href="/employee/{{ $employee->id }}?company={{ $return }}" class="btn btn-primary">View Employee</a></div>
        @endif
    </td>
</tr>