@props(['employee'])

<div class="row mb-3">
    <h2 class="font-bold text-lg"><a href="/employee/{{ $employee['id'] }}">{{ $employee['first_name'] }} {{ $employee['last_name'] }}</a></h2>
</div>
