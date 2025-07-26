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
    <label for="name">Project Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $record->name) }}">
</div>

<!-- Description -->
<div class="mb-3">
    <label for="description">Project Description</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $record->description) }}</textarea>
</div>

<!-- Address -->
<div class="mb-3">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $record->address) }}">
</div>

<!-- Start Date -->
<div class="mb-3">
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $record->start_date) }}">
</div>

<!-- Islamic Date -->
<div class="mb-3">
    <label for="islamic_date">Islamic Date</label>
    <input type="date" name="islamic_date" id="islamic_date" class="form-control" value="{{ old('islamic_date', $record->islamic_date) }}">
</div>

<!-- Project Type -->
<div class="mb-3">
    <label for="project_type">Project Type</label>
    <input type="text" name="project_type" id="project_type" class="form-control" value="{{ old('project_type', $record->project_type) }}">
</div>

<!-- Project Image -->
<div class="mb-3">
    <label for="project_image">Project Image</label>
    <input type="file" name="project_image" id="project_image" class="form-control">
    @if (!empty($record->project_image))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $record->project_image) }}" alt="Project Image" height="100">
        </div>
    @endif
</div>

<!-- Language -->
<div class="mb-3">
    <label for="language">Language</label>
    <select name="language" id="language" class="form-control">
        <option value="english" {{ old('language', $record->language) == 'english' ? 'selected' : '' }}>English</option>
        <option value="urdu" {{ old('language', $record->language) == 'urdu' ? 'selected' : '' }}>Urdu</option>
    </select>
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
