@extends('layouts.app')

@section('template_title')
    {{ $modelCombination->name ?? "{{ __('Show') Model Combination" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Model Combination</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('catalog.model-combinations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Car Model Id:</strong>
                            {{ $modelCombination->car_model_id }}
                        </div>
                        <div class="form-group">
                            <strong>Engine Id:</strong>
                            {{ $modelCombination->engine_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
