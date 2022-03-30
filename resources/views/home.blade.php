@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Machine') }}</div>

                <div class="card-body">
                    {{-- <livewire:machine-index /> --}}
                    @livewire('machine-index')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
