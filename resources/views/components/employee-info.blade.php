@props(['employee', 'full'])

<div style="border: 1px solid grey; display: block; padding: 4px;">
    
    <h2 class="font-bold text-lg m-0">{{ $employee->first_name }} {{ $employee->last_name }}</h2>

    <div style="display: flex; justify-content: space-between;">
        <div style="display: flex; flex-direction: row; gap: 5%; flex-basis:50%">
            @if ($employee->company)
                <p class="m-0">Company: <a href="/company/{{ $employee->company->id }}">{{ $employee->company->name }}</a></p>
            @endif
            <p class="m-0">Contact:&nbsp; {{ $employee->email ? $employee->email . ($employee->phone ? ' - ' . $employee->phone : '') : $employee->phone ?? ''}}</p>
        </div>
        @if($full)
            <div><a href="/employee/{{ $employee->id }}/edit" class="btn btn-primary">Edit Employee</a></div>
        @else
            <div><a href="/employee/{{ $employee->id }}" class="btn btn-primary">View Employee</a></div>
        @endif
    </div>
</div>
