@extends('layouts.master')
@section('title')
    Edit Organization
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Edit Organization
            @endslot
            @slot('subtitle')
                <a href="{{ route('organizations.index') }}">Organizations</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Organization</h4>
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

                    <form method="POST" action="{{ route('organizations.update', $record->id) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ $record->user_id }}">
                        <div class="mb-3">
                            <label>Organization Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $record->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control disabled" value="{{ old('email', $record->email) }}" readonly disabled>
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $record->phone) }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" required>{{ old('address', $record->address) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Password <small>(leave blank to keep existing)</small></label>
                            <input type="text" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Logo</label>
                            <input type="file" name="image" class="form-control">

                            @if ($record->logo)
                                <div class="mt-2">
                                    <img src="{{ $record->logo }}" alt="Logo" width="200">
                                </div>
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
