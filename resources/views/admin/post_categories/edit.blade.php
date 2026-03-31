@extends('layouts.master')
@section('title')
    Edit {{ $singular }}
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Edit  {{ $singular }}
            @endslot
            @slot('subtitle')
                <a href="{{ route( $routePath . '.index') }}">  {{ $plural }}</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit  {{ $singular }}</h4>
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

                    <form method="POST" action="{{ route( $routePath . '.update', $record) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $record->name) }}">
                        </div>

                            <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt</label>
        <textarea name="excerpt" id="excerpt" rows="3" class="form-control">{{ old('excerpt', $record->excerpt) }}</textarea>
        <small class="text-muted">Recommended: 25–30 characters</small>
    </div>

                            <!-- Meta Title -->
                        <div class="mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control"
                                value="{{ old('meta_title', $record->meta_title ?? '') }}">
                            <small class="text-muted">Recommended: 50–60 characters</small>
                        </div>

                        <!-- Meta Description -->
                        <div class="mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                    class="form-control">{{ old('meta_description', $record->meta_description ?? '') }}</textarea>
                            <small class="text-muted">Recommended: 150–160 characters</small>
                        </div>

                        <!-- Meta Keywords -->
                        <div class="mb-3">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                value="{{ old('meta_keywords', $record->meta_keywords ?? '') }}">
                            <small class="text-muted">Comma separated (optional)</small>
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    @endsection
    @section('scripts')
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    @endsection
