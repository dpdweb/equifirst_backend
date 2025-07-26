@extends('layouts.master')
@section('title')
    Create Bayan
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Create Bayan
            @endslot
            @slot('subtitle')
                <a href="{{ route('bayans.index') }}">Bayans</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Bayans</h4>
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

                        <form method="POST" action="{{ route('bayans.store') }}" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="name_urdu">Urdu Name</label>
                                <input type="text" class="form-control" id="name_urdu" name="name_urdu"
                                    value="{{ old('name_urdu') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description_urdu">Urdu Description</label>
                                <textarea class="form-control" id="description_urdu" name="description_urdu" required>{{ old('description_urdu') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="thumbnail">Thumbnail</label>
                                <input type="text" class="form-control" id="thumbnail" name="thumbnail"
                                    value="{{ old('thumbnail') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="video_link">Video Link</label>
                                <input type="text" class="form-control" id="video_link" name="video_link"
                                    value="{{ old('video_link') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="video_duration">Video Duration</label>
                                <textarea class="form-control" id="video_duration" name="video_duration" required>{{ old('video_duration') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category_id">Select Category</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
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
