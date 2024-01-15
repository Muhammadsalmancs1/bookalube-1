@extends('layouts.app')

@section('template_title')
    {{ $carYear->name ?? "{{ __('Show') Car Year" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Car Year</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('car-years.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $carYear->year }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
