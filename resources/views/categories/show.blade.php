@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-tag me-3"></i>{{ $category->name }}
            </h1>
            <p class="text-muted mb-0">Category details and associated products</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Categories
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Category Information
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted">ID</label>
                    <div class="fw-bold">#{{ $category->id }}</div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Name</label>
                    <div class="fw-bold">{{ $category->name }}</div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Description</label>
                    <div>{{ $category->description ?? 'No description provided' }}</div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Created</label>
                    <div>{{ $category->created_at->format('M d, Y \a\t H:i') }}</div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Last Updated</label>
                    <div>{{ $category->updated_at->format('M d, Y \a\t H:i') }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-box me-2"></i>Products in this Category
                </h5>
                <span class="badge bg-primary">{{ $category->products->count() }} {{ Str::plural('product', $category->products->count()) }}</span>
            </div>
            <div class="card-body">
                @if($category->products->count() > 0)
                    <div class="row">
                        @foreach($category->products as $product)
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h6 class="card-title mb-0">{{ $product->name }}</h6>
                                            <span class="badge bg-success">${{ number_format($product->price, 2) }}</span>
                                        </div>
                                        
                                        @if($product->description)
                                            <p class="card-text text-muted small">{{ Str::limit($product->description, 80) }}</p>
                                        @endif
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                <i class="fas fa-barcode me-1"></i>{{ $product->sku }}
                                            </small>
                                            <span class="badge bg-{{ $product->quantity > 10 ? 'success' : ($product->quantity > 0 ? 'warning' : 'danger') }}">
                                                {{ $product->quantity }} in stock
                                            </span>
                                        </div>
                                        
                                        <div class="mt-2">
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye me-1"></i>View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-box-open"></i>
                        <h5>No Products Found</h5>
                        <p>This category doesn't have any products yet.</p>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add First Product
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
