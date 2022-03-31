@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">
            <a href="{{ route('product.home') }}" class="btn btn-lg btn-secondary text-white mb-4">Back</a>
            <div class="card">
                <div class="card-header">{{ __('Dashboard Products') }}</div>

                <div class="card-body">
                    <div class="mb-3 row">
                        <label  class="col-sm-1 col-form-label  fw-bold text-end">Photo</label>
                        <div class="col-sm-10">
                            <img src="{{ asset('storage') }}/{{ $product->photo }}" alt="" srcset="" style="max-width: 1000px">               
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-1 col-form-label  fw-bold text-end">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" disabled value="{{ $product->name }}">               
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-1 col-form-label  fw-bold text-end">Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" disabled value="{{ $product->type }}">               
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-1 col-form-label  fw-bold text-end">Notes</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="{{ $product->notes }}" disabled></textarea>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection