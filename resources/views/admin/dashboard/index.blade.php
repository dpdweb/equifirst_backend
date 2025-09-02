@extends('layouts.master')
@section('title') Dashboard @endsection
@section('css')
<link href="{{URL::asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
@endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')

    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Dashboard</h6>
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item active">Welcome to {{ get_site_name() }} Dashboard </li> --}}
                </ol>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card mini-stat  text-white" style="background-color: #147a9e !important;">
                <div class="card-body">
                    <div class="mb-4">

                        <h5 class="font-size-16 text-uppercase text-white-50">Teams</h5>
                        <h4 class="fw-medium font-size-24">{{ $data['teams'] }}</h4>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card mini-stat  text-white" style="background-color: #147a9e !important;">
                <div class="card-body">
                    <div class="mb-4">

                        <h5 class="font-size-16 text-uppercase text-white-50">Posts</h5>
                        <h4 class="fw-medium font-size-24">{{ $data['posts'] }}</h4>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card mini-stat  text-white" style="background-color: #147a9e !important;">
                <div class="card-body">
                    <div class="mb-4">

                        <h5 class="font-size-16 text-uppercase text-white-50">Testimonials</h5>
                        <h4 class="fw-medium font-size-24">{{ $data['testimonials'] }}</h4>

                    </div>

                </div>
            </div>
        </div>

                <div class="col-xl-4 col-md-6 mb-2">
            <div class="card mini-stat  text-white" style="background-color: #147a9e !important;">
                <div class="card-body">
                    <div class="mb-4">

                        <h5 class="font-size-16 text-uppercase text-white-50">FAQs</h5>
                        <h4 class="fw-medium font-size-24">{{ $data['faqs'] }}</h4>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card mini-stat  text-white" style="background-color: #147a9e !important;">
                <div class="card-body">
                    <div class="mb-4">

                        <h5 class="font-size-16 text-uppercase text-white-50">FAQs Categories</h5>
                        <h4 class="fw-medium font-size-24">{{ $data['faq_categories'] }}</h4>

                    </div>

                </div>
            </div>
        </div>


    </div>
    <!-- end page title -->

    <style>
        .mini-stat {
          display: flex;
          flex-direction: column;
          height: 100%;
        }
        .card-body {
          flex: 1;
        }
    </style>










    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
