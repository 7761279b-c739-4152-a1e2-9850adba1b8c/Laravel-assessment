@props(['employee', 'return' => ''])

<div class="card-body">
    <h3 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h3>

    @if ($employee->company ?? false)
        <p class="card-text">Company: <a href="/company/{{ $employee->company->id }}">{{ $employee->company->name }}</a></p>
    @endif
    @if ($employee->email ?? false)
        <p class="card-text">Email: {{ $employee->email }}</p>
    @endif
    @if ($employee->phone ?? false)
        <p class="card-text">Phone: {{ $employee->phone }}</p>
    @endif
    <div>
        @if ($return == '')
            <a class="btn btn-primary" href="/employee/{{ $employee->id }}/edit" class="btn btn-primary">Edit Employee</a>
        @else
            <a class="btn btn-primary" href="/employee/{{ $employee->id }}/edit?company={{ $return }}" class="btn btn-primary">Edit Employee</a>
        @endif
        <button type="submit" class="btn btn-danger" form="delete-form">{{ __('Delete Employee') }}</button>
    </div>
</div>
@if ($return == '')
    <form method="POST" action="/employee/{{ $employee->id }}" id="delete-form">
@else
    <form method="POST" action="/employee/{{ $employee->id }}?company={{ $return }}" id="delete-form">
@endif
        @csrf
        @method('DELETE')
    </form>
<script>
    document.getElementById('delete-form').addEventListener('submit', event => {
        if (!confirm('Are you sure you want to delete this employee?')) {
            event.preventDefault();
        }
    })
</script>
