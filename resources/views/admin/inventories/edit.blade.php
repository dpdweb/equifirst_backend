@extends('layouts.master')
@section('title')
    Edit Inventory
@endsection
@section('css')
@endsection
@section('body')
<body data-sidebar="dark">
@endsection

@section('content')
@component('components.breadcrumb')
    @slot('page_title') Edit Inventory @endslot
    @slot('subtitle')
        <a href="{{ route('inventories.index') }}">Inventories</a>
    @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Inventory</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('inventories.update', $record->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ $record->user_id }}">

                    <div class="mb-3">
                        <label>Item Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $record->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $record->quantity) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $record->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Organization</label>
                        <select name="organization_id" class="form-control" required>
                            <option value="">Select Organization</option>
                            @foreach ($organizations as $org)
                                <option value="{{ $org->id }}" {{ $record->organization_id == $org->id ? 'selected' : '' }}>
                                    {{ $org->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Notes (Optional)</label>
                        <textarea name="notes" class="form-control">{{ old('notes', $record->notes) }}</textarea>
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
