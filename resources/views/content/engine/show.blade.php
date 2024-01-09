@extends('layouts.app')

@section('template_title')
    {{ $engine->name ?? "{{ __('Show') Engine" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Engine</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('engines.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $engine->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
