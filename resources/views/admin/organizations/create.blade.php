@extends('layouts.master')
@section('title')
    Create Organization
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Create Organization
            @endslot
            @slot('subtitle')
                <a href="{{ route('organizations.index') }}">Organizations</a>
            @endslot
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Organization</h4>
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

                        <form method="POST" action="{{ route('organizations.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label>Organization Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $organization->name ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $organization->email ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $organization->phone ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" required>{{ old('address', $organization->address ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Logo</label>
                                <input type="file" name="image" class="form-control">
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
