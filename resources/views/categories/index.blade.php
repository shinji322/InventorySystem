@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-tags me-3"></i>Categories
            </h1>
            <p class="text-muted mb-0">Manage your product categories</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Category
        </a>
    </div>
</div>

@if($categories->count() > 0)
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">{{ $categories->count() }}</div>
                <div class="stats-label">Total Categories</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">{{ $categories->sum(function($cat) { return $cat->products->count(); }) }}</div>
                <div class="stats-label">Total Products</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">{{ $categories->where('products', '>', 0)->count() }}</div>
                <div class="stats-label">Active Categories</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">{{ $categories->where('products', 0)->count() }}</div>
                <div class="stats-label">Empty Categories</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="border-0">
                                <i class="fas fa-hashtag me-2"></i>ID
                            </th>
                            <th class="border-0">
                                <i class="fas fa-tag me-2"></i>Name
                            </th>
                            <th class="border-0">
                                <i class="fas fa-align-left me-2"></i>Description
                            </th>
                            <th class="border-0">
                                <i class="fas fa-box me-2"></i>Products
                            </th>
                            <th class="border-0">
                                <i class="fas fa-cogs me-2"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <span class="badge bg-primary">#{{ $category->id }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                            <i class="fas fa-tag text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $category->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted">
                                        {{ $category->description ? Str::limit($category->description, 50) : 'No description' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $category->products->count() > 0 ? 'success' : 'secondary' }}">
                                        {{ $category->products->count() }} {{ Str::plural('product', $category->products->count()) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning" title="Edit Category">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this category? This will also delete all associated products.')" 
                                                    title="Delete Category">
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
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
@else
    <div class="card">
        <div class="card-body">
            <div class="empty-state">
                <i class="fas fa-tags"></i>
                <h4>No Categories Found</h4>
                <p>Get started by creating your first category.</p>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create First Category
                </a>
            </div>
        </div>
    </div>
@endif
@endsection
