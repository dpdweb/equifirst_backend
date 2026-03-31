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

                        <ul class="nav nav-tabs" id="pageTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#basic">Post Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#seo">SEO Meta</a>
                                </li>
                        </ul>
                        <div class="tab-content pt-4">

                            <div class="tab-pane fade show active" id="basic">

                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="" placeholder="Name">
                                </div>

                            <div class="mb-3">
                                <label for="excerpt" class="form-label">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" rows="3" class="form-control">{{ old('excerpt') }}</textarea>
                                <small class="text-muted">Recommended: 25–30 characters</small>
                            </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Category Image</label>
                                    <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="image_title" class="form-label">Image Title</label>
                                    <input type="text" name="image_title" class="form-control" value="{{ old('image_title') }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="image_alt" class="form-label">Image Alt Text</label>
                                    <input type="text" name="image_alt" class="form-control" value="{{ old('image_alt') }}"
                                        required>
                                </div>



                            </div>

                            <div class="tab-pane fade" id="seo">

                                <div class="mb-3">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                                        value="{{ old('meta_title', $record->meta_title ?? '') }}">
                                    <small class="text-muted">Recommended: 50–60 characters</small>
                                </div>

                                <div class="mb-3">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" rows="3"
                                            class="form-control">{{ old('meta_description', $record->meta_description ?? '') }}</textarea>
                                    <small class="text-muted">Recommended: 150–160 characters</small>
                                </div>

                                <div class="mb-3">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                        value="{{ old('meta_keywords', $record->meta_keywords ?? '') }}">
                                    <small class="text-muted">Comma separated (optional)</small>
                                </div>

                            </div>


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
