@extends('dashboard.seller-dashboard')

@section('dashboard-content')
<div class="container-fluid blogs-management">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">My Blogs</h3>
                    <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New Blog
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
                    @if($blogs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Published Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>
                                                @if($blog->featured_image)
                                                    <img src="{{ asset('storage/'.$blog->featured_image) }}" 
                                                         alt="{{ $blog->title }}" 
                                                         class="img-thumbnail mr-2" 
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                                {{ $blog->title }}
                                            </td>
                                            <td>
                                                <span class="badge 
                                                    {{ $blog->status == 'published' ? 'badge-success' : 'badge-warning' }}">
                                                    {{ ucfirst($blog->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $blog->formatted_published_date }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('dashboard.blogs.edit', $blog) }}" 
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('dashboard.blogs.destroy', $blog) }}" 
                                                          method="POST" 
                                                          onsubmit="return confirm('Are you sure you want to delete this blog?');">
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
                        {{ $blogs->links() }}
                    @else
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            You haven't created any blogs yet. 
                            <a href="{{ route('dashboard.blogs.create') }}" class="alert-link">Create your first blog</a>
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
    .blogs-management .table img {
        vertical-align: middle;
        margin-right: 10px;
    }
</style>
@endpush
