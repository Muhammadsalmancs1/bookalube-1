@extends('layouts.app')

@section('template_title')
    {{ $yearCombination->name ?? "{{ __('Show') Year Combination" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Year Combination</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('year-combinations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Car Brand Id:</strong>
                            {{ $yearCombination->car_brand_id }}
                        </div>
                        <div class="form-group">
                            <strong>Car Year Id:</strong>
                            {{ $yearCombination->car_year_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
