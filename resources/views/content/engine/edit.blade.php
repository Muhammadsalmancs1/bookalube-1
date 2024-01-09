@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Engine
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Engine</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('engines.update', $engine->id) }}" role="form"
                              enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('content.engine.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
