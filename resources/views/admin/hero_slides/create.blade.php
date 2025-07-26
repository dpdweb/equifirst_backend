@extends('layouts.master')
@section('title')
    Create {{ $singular }}
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Create {{ $singular }}
            @endslot
            @slot('subtitle')
                <a href="{{ route( $routePath . '.index') }}">Projects</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">{{ $singular }}</h4>
                        <p class="card-title-desc"></p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route( $routePath . '.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name">Title</label>
                            <input type="text" name="name" id="name" class="form-control" value="" placeholder="Title (optional)">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="image">Images</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>





                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    @endsection
    @section('scripts')
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    @endsection
