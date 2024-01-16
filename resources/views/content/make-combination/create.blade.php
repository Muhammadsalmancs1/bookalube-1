@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Make Combination
@endsection

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="pt-3 pb-2">Registration</h4>
                        <!-- Striped Rows -->
                        <div class="card">
                            <h5 class="card-header">Make Combination Form</h5>
                            <div class="card-body">
                                <form method="POST" action="{{route('make-combinations.store')}}">
                                    @csrf
                                    @include('content.make-combination.form')
                                </form>
                            </div>
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>

            </div>
        </div>
    </section>
@endsection

