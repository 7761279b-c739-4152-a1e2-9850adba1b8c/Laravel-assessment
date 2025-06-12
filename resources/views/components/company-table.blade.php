@props(['companies'])

<div class="table-responsive">
    <table class="table mb-0">
        <thead class="small text-uppercase bg-body text-muted">
            <tr>
                <th><!-- Logo --></th>
                <th>Name</th>
                <th>Contact</th>
                <th>Website</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <x-company-row :company=$company />
            @endforeach()
        </tbody>
    </table>
</div>