<div>
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
                            <a href="{{ route('machine.details',$machine->id) }}" class="btn btn-sm btn-success text-white">Detail</a>
                            <a href="{{ route('machine.edit',$machine->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                            <button class="btn btn-sm btn-danger text-white" onclick="confirm('Are you sure want to delete this data?')">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody> 
    </table>
</div>
