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
            @foreach ($materials as $material)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage') }}/{{ $material->photo }}" alt="" srcset="" style="max-width: 600px">
                    </td>
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->type }}</td>
                    <td style="max-width: 200px" >{{ $material->notes }}</td>
                    <td>
                        <div class="text-center">
                            <a href="{{ route('material.details',$material->id) }}" class="btn btn-sm btn-success text-white">Detail</a>
                            <a href="{{ route('material.edit',$material->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                            <button class="btn btn-sm btn-danger text-white" onclick="confirm('Are you sure want to delete this data?')" wire:click="delete({{ $material->id }})">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody> 
    </table>
</div>
