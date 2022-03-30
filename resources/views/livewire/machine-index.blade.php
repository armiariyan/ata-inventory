<div>
    {{-- Do your work, then step back. --}}
    <table class="table table-striped table-hover table-bordered">
        <thead class="">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Type</th>
                <th>Data Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $machine->name }}</td>
                    <td>{{ $machine->type }}</td>
                    <td>{{ $machine->notes }}</td>
                    <td>
                        <button class="btn btn-sm btn-info text-white">Edit</button>
                        <button class="btn btn-sm btn-danger text-white" onclick="alert('Are you sure want to delete this data?')">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody> 
    </table>
</div>
