@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

                            <ul class="nav nav-tabs" id="pageTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#basic">Post Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#seo">SEO Meta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#faqs">FAQs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tags">Tags</a>
                                </li>
                            </ul>

                            <div class="tab-content pt-4">

                                <div class="tab-pane fade show active" id="basic">


                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input name="title" class="form-control" value="{{ old('title') }}" >
                            </div>


                            <div class="mb-3">
                                <label for="excerpt" class="form-label">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" rows="3" class="form-control">{{ old('excerpt') }}</textarea>
                                <small class="text-muted">Recommended: 25–30 characters</small>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Select Category</label><br>
                                @foreach ($categories as $category)
                                    <input type="checkbox" id="category_{{ $category->id }}" name="category_ids[]" value="{{ $category->id }}"
                                        {{ in_array($category->id, old('category_ids', [])) ? 'checked' : '' }}>
                                    <label for="category_{{ $category->id }}">{{ $category->name }}</label><br>
                                @endforeach
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Featured Image</label>
                                <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                                    >
                            </div>
                            <div class="mb-3">
                                <label for="image_title" class="form-label">Image Title</label>
                                <input type="text" name="image_title" class="form-control" value="{{ old('image_title') }}"
                                    >
                            </div>
                            <div class="mb-3">
                                <label for="image_alt" class="form-label">Image Alt Text</label>
                                <input type="text" name="image_alt" class="form-control" value="{{ old('image_alt') }}"
                                    >
                            </div>


                            <div class="mb-3">
                                <label for="author_id">Select Author</label>
                                <select name="author_id" id="author_id" class="form-control" >
                                    <option value="">-- Select Team --</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}"
                                            {{ old('author_id') }}>
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                                </div>

                                <div class="tab-pane fade" id="seo">
                                    <!-- Meta Title -->
                                    <div class="mb-3">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" id="meta_title" class="form-control"
                                            value="{{ old('meta_title', $record->meta_title ?? '') }}">
                                        <small class="text-muted">Recommended: 50–60 characters</small>
                                    </div>

                                    <!-- Meta Description -->
                                    <div class="mb-3">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" rows="3"
                                                class="form-control">{{ old('meta_description', $record->meta_description ?? '') }}</textarea>
                                        <small class="text-muted">Recommended: 150–160 characters</small>
                                    </div>

                                    <!-- Meta Keywords -->
                                    <div class="mb-3">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                            value="{{ old('meta_keywords', $record->meta_keywords ?? '') }}">
                                        <small class="text-muted">Comma separated (optional)</small>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="faqs">
                                    <div class="mb-3">
                                        <label for="faq_ids">Select FAQs</label>
                                        <select name="faq_ids[]" id="faq_ids" class="form-control" multiple>
                                            @foreach ($faqs as $faq)
                                                <option value="{{ $faq->id }}"
                                                    {{ in_array($faq->id, old('faq_ids', [])) ? 'selected' : '' }}>
                                                    {{ $faq->question ?? 'FAQ #' . $faq->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="tags">
                                    <div class="mb-3">
                                        <label for="tag_dis">Select Tags</label><br>
                                        @foreach ($tags as $tag)
                                            <input type="checkbox" id="tag_{{ $tag->id }}" name="tag_ids[]" value="{{ $tag->id }}"
                                                {{ in_array($tag->id, old('tag_ids', [])) ? 'checked' : '' }}>
                                            <label for="tag_{{ $tag->id }}">{{ $tag->name }}</label><br>

                                        @endforeach

                                    </div>
                                </div>

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
        {{-- <script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script> --}}

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {


                tinymce.init({
                selector: '#elm1',
                height: 400,

                menubar: true,
                plugins: 'image link media code lists',

                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image media | code',

                automatic_uploads: true,

                relative_urls: false,
                remove_script_host: false,
                convert_urls: true,

                images_upload_handler: function (blobInfo, success, failure) {

                    let tokenMeta = document.querySelector('meta[name="csrf-token"]');

                    let formData = new FormData();
                    formData.append('file', blobInfo.blob());
                    formData.append('_token', tokenMeta.getAttribute('content'));

                    fetch("{{ route('upload.post.image') }}", {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        success(data.location); // full URL
                    })
                    .catch(() => {
                        failure('Upload failed');
                    });
                }
            });

            function updateOptions(selector) {
                let selectedValues = $(selector).val() || [];

                $(selector + ' option').each(function () {
                    if (selectedValues.includes($(this).val())) {
                        $(this).attr('disabled', true);
                    } else {
                        $(this).attr('disabled', false);
                    }
                });
            }

            function initSelect2(selector, placeholderText) {
                $(selector).select2({
                    placeholder: placeholderText,
                    allowClear: true,
                    width: '100%',
                    closeOnSelect: false
                });
            }

            initSelect2('#faq_ids', "Select FAQs");
            initSelect2('#tag_dis', "Select Tags");

            updateOptions('#faq_ids');
            updateOptions('#tag_dis');

            $('#faq_ids').on('select2:select select2:unselect', function () {
                let selectedFaqs = $(this).val() || [];
                if (selectedFaqs.includes(e.params.args.data.id)) {
                    e.preventDefault();
                }
            });

            $('#tag_dis').on('select2:select select2:unselect', function () {
                let selected = $(this).val() || [];
                if (selected.includes(e.params.args.data.id)) {
                    e.preventDefault();
                }
            });


            });
        </script>
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    @endsection
