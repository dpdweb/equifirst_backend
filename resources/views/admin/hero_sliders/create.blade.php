@extends('layouts.master')
@section('title')
    Create Hero Slide
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Create Hero Slide
            @endslot
            @slot('subtitle')
                <a href="{{ route('hero-sliders.index') }}">Projects</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Hero Slide</h4>
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

                        <form action="{{ route('hero-sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name">Title</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('title') }}" placeholder="Title (optional)">
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
