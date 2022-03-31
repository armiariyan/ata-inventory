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
                <div class="card-header">{{ __('Dashboard Material') }}</div>

                <div class="card-body">
                    @livewire('material-create')
                    @livewire('material-table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection