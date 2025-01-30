@extends('dashboard.seller-dashboard')

@section('dashboard-content')
<div class="container-fluid edit-advertisement">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Advertisement</h3>
                </div>
                
                <form action="{{ route('dashboard.advertisements.update', $advertisement) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Advertisement Title</label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $advertisement->title) }}" 
                                   required 
                                   placeholder="Enter advertisement title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea 
                                class="form-control @error('description') is-invalid @enderror" 
                                id="description" 
                                name="description" 
                                rows="4" 
                                placeholder="Enter advertisement description">{{ old('description', $advertisement->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Advertisement Image</label>
                            <div class="custom-file">
                                <input type="file" 
                                       class="custom-file-input @error('image') is-invalid @enderror" 
                                       id="image" 
                                       name="image" 
                                       accept="image/*">
                                <label class="custom-file-label" for="image">
                                    {{ $advertisement->image_path ? basename($advertisement->image_path) : 'Choose image' }}
                                </label>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            @if($advertisement->image_path)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/'.$advertisement->image_path) }}" 
                                         alt="{{ $advertisement->title }}" 
                                         class="img-fluid" 
                                         style="max-height: 300px;">
                                    <small class="form-text text-muted">Current advertisement image</small>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="link">Advertisement Link (Optional)</label>
                            <input type="url" 
                                   class="form-control @error('link') is-invalid @enderror" 
                                   id="link" 
                                   name="link" 
                                   value="{{ old('link', $advertisement->link) }}" 
                                   placeholder="Enter URL for the advertisement">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="position">Advertisement Position</label>
                                    <select 
                                        class="form-control @error('position') is-invalid @enderror" 
                                        id="position" 
                                        name="position" 
                                        required>
                                        <option value="">Select Position</option>
                                        <option value="homepage" {{ old('position', $advertisement->position) == 'homepage' ? 'selected' : '' }}>Homepage</option>
                                        <option value="sidebar" {{ old('position', $advertisement->position) == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                                        <option value="footer" {{ old('position', $advertisement->position) == 'footer' ? 'selected' : '' }}>Footer</option>
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date">Start Date (Optional)</label>
                                    <input type="date" 
                                           class="form-control @error('start_date') is-invalid @enderror" 
                                           id="start_date" 
                                           name="start_date" 
                                           value="{{ old('start_date', $advertisement->start_date ? $advertisement->start_date->format('Y-m-d') : '') }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date">End Date (Optional)</label>
                                    <input type="date" 
                                           class="form-control @error('end_date') is-invalid @enderror" 
                                           id="end_date" 
                                           name="end_date" 
                                           value="{{ old('end_date', $advertisement->end_date ? $advertisement->end_date->format('Y-m-d') : '') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category (Optional)</label>
                                    <input type="text" 
                                           class="form-control @error('category') is-invalid @enderror" 
                                           id="category" 
                                           name="category" 
                                           value="{{ old('category', $advertisement->category) }}" 
                                           placeholder="Enter advertisement category">
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority">Priority (Optional)</label>
                                    <input type="number" 
                                           class="form-control @error('priority') is-invalid @enderror" 
                                           id="priority" 
                                           name="priority" 
                                           value="{{ old('priority', $advertisement->priority ?? 0) }}" 
                                           min="0" 
                                           max="10">
                                    @error('priority')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror>
                                    <small class="form-text text-muted">
                                        Higher priority ads will be displayed first (0-10)
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" 
                                       class="custom-control-input" 
                                       id="is_active" 
                                       name="is_active" 
                                       {{ old('is_active', $advertisement->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">
                                    Active Advertisement
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Advertisement Information</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Created At:</strong> {{ $advertisement->created_at->format('F d, Y H:i') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Last Updated:</strong> {{ $advertisement->updated_at->format('F d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Advertisement
                        </button>
                        <a href="{{ route('dashboard.advertisements') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Custom file input label
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endpush
