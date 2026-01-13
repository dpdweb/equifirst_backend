@php
    use Faker\Factory;

    $faker = app()->environment('local') ? Factory::create() : null;
@endphp

@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('css')
<style>
    #sortable-list .list-group-item {
        cursor: move;
        transition: all 0.3s ease;
    }

    #sortable-list .list-group-item:hover {
        background-color: #f8f9fa;
    }

    #sortable-list .list-group-item.sortable-ghost {
        opacity: 0.4;
        background-color: #e9ecef;
    }

    #sortable-list .list-group-item.sortable-drag {
        opacity: 0.8;
    }
</style>
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

                    <h4 class="card-title">{{ $plural }}</h4>
                    <p class="card-title-desc">Drag and drop items to reorder them</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div id="sortable-list" class="list-group">
                        @forelse($records as $record)
                        <div class="list-group-item" data-id="{{ $record->id }}">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-grip-vertical text-muted me-3" style="cursor: move;"></i>
                                @if($record->image)
                                <img src="{{ asset('storage/' . $record->image) }}"
                                     alt="{{ $record->name }}"
                                     class="rounded-circle me-3"
                                     style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                <div class="bg-secondary rounded-circle me-3 d-flex align-items-center justify-content-center"
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                @endif
                                <div>
                                    <h5 class="mb-0">{{ $record->name }}</h5>
                                    <small class="text-muted">{{ $record->role }}</small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-warning">
                            No {{ $plural }} found.
                        </div>
                        @endforelse
                    </div>

                    @if($records->count() > 0)
                    <div class="mt-3">
                        <button type="button" id="save-order" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Order
                        </button>
                        <a href="{{ route($routePath . '.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>

    <!-- Include Sortable.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sortableList = document.getElementById('sortable-list');

            if (sortableList) {
                // Initialize Sortable
                const sortable = new Sortable(sortableList, {
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    dragClass: 'sortable-drag',
                    handle: '.list-group-item',
                    onEnd: function(evt) {
                        console.log('Item moved from index ' + evt.oldIndex + ' to ' + evt.newIndex);
                    }
                });

                // Save order button
                const saveBtn = document.getElementById('save-order');
                if (saveBtn) {
                    saveBtn.addEventListener('click', function() {
                        const items = [];
                        const listItems = sortableList.querySelectorAll('.list-group-item');

                        listItems.forEach((item, index) => {
                            items.push({
                                id: item.getAttribute('data-id'),
                                sort_id: index
                            });
                        });

                        // Disable button and show loading
                        saveBtn.disabled = true;
                        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';

                        // Send AJAX request
                        fetch('{{ route($routePath . '.sort-save') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ items: items })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                showAlert('success', data.message);
                                saveBtn.disabled = false;
                                saveBtn.innerHTML = '<i class="fas fa-save"></i> Save Order';
                            } else {
                                showAlert('error', 'Failed to save order');
                                saveBtn.disabled = false;
                                saveBtn.innerHTML = '<i class="fas fa-save"></i> Save Order';
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showAlert('error', 'An error occurred while saving');
                            saveBtn.disabled = false;
                            saveBtn.innerHTML = '<i class="fas fa-save"></i> Save Order';
                        });
                    });
                }
            }

            function showAlert(type, message) {
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
                alertDiv.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;

                const cardBody = document.querySelector('.card-body');
                cardBody.insertBefore(alertDiv, cardBody.firstChild);

                // Auto-dismiss after 3 seconds
                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
            }
        });
    </script>
@endsection
