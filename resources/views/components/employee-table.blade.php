@props(['employees'])

<div class="table-responsive">
    <table class="table mb-0">
        <thead class="small text-uppercase bg-body text-muted">
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Contact</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <x-employee-row :employee=$employee />
            @endforeach()
        </tbody>
    </table>
</div>