@extends('layouts.master')
@section('title')
    Edit Page
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Edit Bayan Category
            @endslot
            @slot('subtitle')
                <a href="{{ route('pages.index') }}"> Categories</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Bayan Categories</h4>
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

                    <form method="POST" action="{{ route('pages.update', $record) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

<div class="mb-3">
    <label class="form-label" for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $record->name) }}" required>
</div>

<div class="mb-3">
    <label class="form-label" for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $record->slug) }}">
</div>

<div class="mb-3">
    <label class="form-label" for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $record->description) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label" for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image">
    @if($record->image)
        <img src="{{ asset('storage/' . $record->image) }}" alt="Current Image" class="mt-2" style="height: 100px;">
    @endif
</div>

<div class="mb-3">
    <label class="form-label" for="link">Link</label>
    <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $record->link) }}">
</div>

<div class="mb-3">
    <label class="form-label" for="language">Language</label>
    <input type="text" class="form-control" id="language" name="language" value="{{ old('language', $record->language) }}">
</div>

<hr>
<h5>SEO Fields</h5>

<div class="mb-3">
    <label class="form-label" for="meta_title">Meta Title</label>
    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $record->meta_title) }}">
</div>

<div class="mb-3">
    <label class="form-label" for="meta_keywords">Meta Keywords</label>
    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $record->meta_keywords) }}">
</div>

<div class="mb-3">
    <label class="form-label" for="meta_description">Meta Description</label>
    <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $record->meta_description) }}</textarea>
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
