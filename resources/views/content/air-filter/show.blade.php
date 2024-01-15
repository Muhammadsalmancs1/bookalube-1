@extends('layouts.app')

@section('template_title')
    {{ $airFilter->name ?? "{{ __('Show') Air Filter" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Air Filter</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('air-filters.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $airFilter->name }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $airFilter->price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
