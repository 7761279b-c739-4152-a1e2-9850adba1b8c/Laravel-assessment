@props(['employee'])

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
        <a class="btn btn-primary" href="/employee/{{ $employee->id }}/edit" class="btn btn-primary">Edit Employee</a>
        <button type="submit" class="btn btn-danger" form="delete-form">{{ __('Delete Employee') }}</button>
    </div>
</div>
<form method="POST" action="/employee/{{ $employee->id }}" id="delete-form">
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
