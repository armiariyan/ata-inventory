<div>

    @if (session()->has('message'))
    <div class="alert alert-success fw-bold alert-dismissible fade show fs-5">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    {{-- Connect to Machine Create --}}
    @livewire('machine-create')
   
    <table class="table table-striped table-hover table-bordered">
        <thead class="">
            <tr>
                <th>No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Type</th>
                <th>Data Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($machines as $machine)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage') }}/{{ $machine->photo }}" alt="" srcset="" style="max-width: 600px">
                    </td>
                    <td>{{ $machine->name }}</td>
                    <td>{{ $machine->type }}</td>
                    <td style="max-width: 200px" >{{ $machine->notes }}</td>
                    <td>
                        <div class="text-center">
                            <button class="btn btn-sm btn-info text-white">Edit</button>
                            <button class="btn btn-sm btn-danger text-white" onclick="alert('Are you sure want to delete this data?')">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody> 
    </table>
</div>
