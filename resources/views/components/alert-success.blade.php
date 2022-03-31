<div>
    @if (session()->has('message'))
        <div class="alert alert-success fw-bold alert-dismissible fade show fs-5">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>