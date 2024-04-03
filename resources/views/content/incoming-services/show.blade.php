@extends('layouts.app')

@section('template_title')
    {{ $literCombination->name ?? "{{ __('Show') Liter Combination" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Liter Combination</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('liter-combinations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Liter:</strong>
                            {{ $literCombination->liter }}
                        </div>
                        <div class="form-group">
                            <strong>Car Year Id:</strong>
                            {{ $literCombination->car_year_id }}
                        </div>
                        <div class="form-group">
                            <strong>Car Brand Id:</strong>
                            {{ $literCombination->car_brand_id }}
                        </div>
                        <div class="form-group">
                            <strong>Car Model Id:</strong>
                            {{ $literCombination->car_model_id }}
                        </div>
                        <div class="form-group">
                            <strong>Engine Id:</strong>
                            {{ $literCombination->engine_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
