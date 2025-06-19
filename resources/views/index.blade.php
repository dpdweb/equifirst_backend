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
                <h6 class="page-title">Starter Page</h6>
            </div>
        </div>
    </div>

    @endsection
    @section('scripts')

    <!-- Peity chart-->
    <script src="{{URL::asset('assets/libs/peity/peity.min.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{URL::asset('assets/libs/chartist/chartist.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
