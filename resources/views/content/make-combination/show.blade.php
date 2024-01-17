@extends('layouts.app')

@section('template_title')
    {{ $makeCombination->name ?? "{{ __('Show') Make Combination" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Make Combination</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('catalog.make-combinations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Car Brand Id:</strong>
                            {{ $makeCombination->car_brand_id }}
                        </div>
                        <div class="form-group">
                            <strong>Car Model Id:</strong>
                            {{ $makeCombination->car_model_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
