<div>
    <table class="table table-striped table-hover table-bordered">
        <thead class="">
            <tr>
                <th>No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Data Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($moldings as $molding)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage') }}/{{ $molding->photo }}" alt="" srcset="" style="max-width: 600px">
                    </td>
                    <td>{{ $molding->name }}</td>
                    <td style="max-width: 200px" >{{ $molding->notes }}</td>
                    <td>
                        <div class="text-center">
                            <a href="{{ route('molding.details',$molding->id) }}" class="btn btn-sm btn-success text-white">Detail</a>
                            <a href="{{ route('molding.edit',$molding->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                            <button class="btn btn-sm btn-danger text-white" onclick="confirm('Are you sure want to delete this data?')" wire:click="delete({{ $molding->id }})">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody> 
    </table>
</div>
