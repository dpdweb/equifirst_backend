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

                        <form method="POST" action="{{ route($routePath . '.update', $record->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $record->name ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="designation">Designation</label>
                                <input type="text" name="designation" class="form-control"
                                    value="{{ old('designation', $record->designation ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', $record->description ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="rating">Rating (1-5)</label>
                                <input type="number" name="rating" min="1" max="5" class="form-control"
                                    value="{{ old('rating', $record->rating ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                                @if (!empty($record->image))
                                    <img src="{{ asset('storage/' . $record->image) }}" alt="image"
                                        class="img-thumbnail mt-2" width="120">
                                @endif
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
