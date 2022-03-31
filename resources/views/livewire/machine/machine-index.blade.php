@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Machine') }}</div>

                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success fw-bold alert-dismissible fade show fs-5">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @livewire('machine.machine-create')
                    @livewire('machine.machine-table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection