@extends('layouts.master')
@section('title')
    Edit Event
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Edit Event
            @endslot
            @slot('subtitle')
                <a href="{{ route('teams.index') }}"> Events</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Event</h4>
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

                    <form method="POST" action="{{ route('teams.update', $record) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $record->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Role</label>
                            <input type="text" name="role" class="form-control" value="{{ old('role', $record->role) }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Profile Image</label>
                            @if ($record->image)
                                <div class="mb-2">
                                    <img src="{{ $record->image }}" alt="Profile Image" width="80">
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $record->email) }}">
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $record->phone) }}">
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required>{{ old('description', $record->description) }}</textarea>
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
