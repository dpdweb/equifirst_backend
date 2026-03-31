@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                {{ $title }}
            @endslot
            @slot('subtitle')
                <a href="{{ route($routePath . '.index') }}">{{ $plural }}</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">{{ $title }}</h4>
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

<form action="{{ isset($record) ? route($routePath.'.update', $record->id) : route($routePath.'.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@if(isset($record))
    @method('PUT')
@endif

<!-- Tabs Navigation -->
<ul class="nav nav-tabs" id="pageTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#basic">Basic Info</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#seo">SEO Meta</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#hero">Hero Section</a>
    </li>
</ul>

<div class="tab-content pt-4">

<!-- ================= Basic Information ================= -->
<div class="tab-pane fade show active" id="basic">

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title"
               class="form-control"
               value="{{ old('title', $record->title ?? '') }}">
    </div>

</div>


<!-- ================= SEO Meta ================= -->
<div class="tab-pane fade" id="seo">

    <div class="mb-3">
        <label>Meta Title</label>
        <input type="text"
               name="meta_title"
               class="form-control"
               value="{{ old('meta_title', $record->meta_title ?? '') }}">
        <small class="text-muted">Recommended: 50–60 characters</small>
    </div>

    <div class="mb-3">
        <label>Meta Description</label>
        <textarea name="meta_description"
                  rows="3"
                  class="form-control">{{ old('meta_description', $record->meta_description ?? '') }}</textarea>
        <small class="text-muted">Recommended: 150–160 characters</small>
    </div>

    <div class="mb-3">
        <label>Meta Keywords</label>
        <input type="text"
               name="meta_keywords"
               class="form-control"
               value="{{ old('meta_keywords', $record->meta_keywords ?? '') }}">
        <small class="text-muted">Comma separated (optional)</small>
    </div>

</div>


<!-- ================= Hero Section ================= -->
<div class="tab-pane fade" id="hero">

    <div class="mb-3">
        <label class="form-label">Hero Title</label>
        <input type="text"
               name="hero_title"
               class="form-control"
               value="{{ old('hero_title', $record->hero_title ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Hero Sub Title</label>
        <input type="text"
               name="hero_subtitle"
               class="form-control"
               value="{{ old('hero_subtitle', $record->hero_sub_title ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Hero Image</label>
        <input type="file" name="hero_image" class="form-control">

        @if(isset($record) && $record->hero_image)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$record->hero_image) }}" width="200">
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Image Title</label>
        <input type="text"
               name="hero_image_title"
               class="form-control"
               value="{{ old('hero_image_title', $record->hero_image_title ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Image Alt Text</label>
        <input type="text"
               name="hero_image_alt"
               class="form-control"
               value="{{ old('hero_image_alt', $record->hero_image_alt ?? '') }}">
    </div>

</div>

</div>

<div class="mt-4">
    <button type="submit" class="btn btn-primary">
        {{ isset($record) ? 'Update' : 'Create' }}
    </button>
</div>

</form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    @endsection
    @section('scripts')
        <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    @endsection
