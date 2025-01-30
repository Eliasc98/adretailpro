@extends('dashboard.seller-dashboard')

@section('dashboard-content')
<div class="container-fluid advertisements-management">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">My Advertisements</h3>
                    <a href="{{ route('dashboard.advertisements.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New Advertisement
                    </a>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body">
                    @if($advertisements->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($advertisements as $ad)
                                        <tr>
                                            <td>
                                                @if($ad->image_path)
                                                    <img src="{{ asset('storage/'.$ad->image_path) }}" 
                                                         alt="{{ $ad->title }}" 
                                                         class="img-thumbnail mr-2" 
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                                {{ $ad->title }}
                                            </td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ ucfirst($ad->position) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge 
                                                    {{ $ad->is_active ? 'badge-success' : 'badge-warning' }}">
                                                    {{ $ad->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>{{ $ad->start_date ? $ad->start_date->format('Y-m-d') : 'N/A' }}</td>
                                            <td>{{ $ad->end_date ? $ad->end_date->format('Y-m-d') : 'N/A' }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('dashboard.advertisements.edit', $ad) }}" 
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('dashboard.advertisements.destroy', $ad) }}" 
                                                          method="POST" 
                                                          onsubmit="return confirm('Are you sure you want to delete this advertisement?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $advertisements->links() }}
                    @else
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            You haven't created any advertisements yet. 
                            <a href="{{ route('dashboard.advertisements.create') }}" class="alert-link">Create your first advertisement</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .advertisements-management .table img {
        vertical-align: middle;
        margin-right: 10px;
    }
</style>
@endpush
