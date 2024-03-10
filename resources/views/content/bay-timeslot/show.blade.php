@extends('layouts.app')

@section('template_title')
    {{ $bayTimeslot->name ?? "{{ __('Show') Bay Timeslot" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bay Timeslot</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bay-timeslots.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Bay Id:</strong>
                            {{ $bayTimeslot->bay_id }}
                        </div>
                        <div class="form-group">
                            <strong>Start Time:</strong>
                            {{ $bayTimeslot->start_time }}
                        </div>
                        <div class="form-group">
                            <strong>End Time:</strong>
                            {{ $bayTimeslot->end_time }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
