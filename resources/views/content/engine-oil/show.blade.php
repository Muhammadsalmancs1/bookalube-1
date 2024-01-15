@extends('layouts.app')

@section('template_title')
    {{ $engineOil->name ?? "{{ __('Show') Engine Oil" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Engine Oil</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('engine-oils.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $engineOil->name }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $engineOil->price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
