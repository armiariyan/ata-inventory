<div>

   

    {{-- Title --}}
    <h4 class="text-end"> <span class="badge rounded-pill bg-success">Manage Machine Data</span>  </h4>
   
    <form wire:submit.prevent="store">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="photo" class="col col-form-label fw-bold">Photo (max 5mb)</label>
                    <input wire:model="photo" type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">

                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="name" class="col col-form-label fw-bold">Name</label>
                    <input wire:model="name" type="text" id="name" name="" class="form-control @error('name') is-invalid @enderror" >

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="type" class="col col-form-label fw-bold">Type</label>
                    <input wire:model="type" type="text" name="" class="form-control  @error('type') is-invalid @enderror" >

                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="photo" class="col col-form-label fw-bold">Notes</label>
                    <input wire:model="notes" type="text" name="" class="form-control  @error('notes') is-invalid @enderror">

                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-grid py-4">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>

    <hr>
</div>
