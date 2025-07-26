@extends('layouts.master')
@section('title')
    Create {{ $singular }}
@endsection
@section('css')
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Create {{ $singular }}
            @endslot
            @slot('subtitle')
                <a href="{{ route($routePath . '.index') }}">Projects</a>
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
                            <!-- FAQ Category -->
                            <div class="mb-3">
                                <label for="faq_category_id">Category</label>
                                <select name="faq_category_id" id="faq_category_id" class="form-control" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('faq_category_id', $record->faq_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Question -->
                            <div class="mb-3">
                                <label for="question">Question</label>
                                <input type="text" name="question" id="question" class="form-control"
                                    value="{{ old('question', $record->question ?? '') }}" placeholder="Enter FAQ question"
                                    required>
                            </div>

                            <!-- Answer -->
                            <div class="mb-3">
                                <label for="answer">Answer</label>
                                <textarea name="answer" id="answer" class="form-control" rows="5" placeholder="Enter FAQ answer" required>{{ old('answer', $record->answer ?? '') }}</textarea>
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
