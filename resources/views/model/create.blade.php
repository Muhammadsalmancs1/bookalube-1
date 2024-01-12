@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Model
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Model</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('models.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('model.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
