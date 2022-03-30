<div>

    @if (session()->has('message'))
    <div class="alert alert-success fw-bold alert-dismissible fade show fs-5">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    {{-- Connect to Machine Create --}}
    @livewire('machine-create')

    {{-- Title --}}
    <h4 class="text-end py-3"> <span class="badge rounded-pill bg-primary ">Manage Machine Data</span>  </h4>

   

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
