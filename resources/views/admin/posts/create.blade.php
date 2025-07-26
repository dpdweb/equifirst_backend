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

                        <form action="{{ route($routePath . '.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input name="title" class="form-control" value="{{ old('title') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Featured Image</label>
                                <input type="file" name="image" class="form-control" value="{{ old('image') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

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
