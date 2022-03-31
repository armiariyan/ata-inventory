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
            <a href="{{ route('molding.home') }}" class="btn btn-lg btn-secondary text-white mb-4">Back</a>
            <div class="card">    

                <div class="card-header">{{ __('Dashboard molding') }}</div>

                <div class="card-body">
                    @livewire('molding-edit', ['molding' => $molding])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection