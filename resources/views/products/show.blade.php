@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-box me-3"></i>{{ $product->name }}
            </h1>
            <p class="text-muted mb-0">Product details and information</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Products
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Product Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">ID</label>
                            <div class="fw-bold">#{{ $product->id }}</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Name</label>
                            <div class="fw-bold">{{ $product->name }}</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">SKU</label>
                            <div>
                                <code class="bg-light px-2 py-1 rounded">{{ $product->sku }}</code>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Category</label>
                            <div>
                                <a href="{{ route('categories.show', $product->category) }}" class="text-decoration-none">
                                    <span class="badge bg-info">{{ $product->category->name }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Price</label>
                            <div class="fw-bold text-success fs-4">${{ number_format($product->price, 2) }}</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Stock Quantity</label>
                            <div>
                                @if($product->quantity > 10)
                                    <span class="badge bg-success fs-6">{{ $product->quantity }} in stock</span>
                                @elseif($product->quantity > 0)
                                    <span class="badge bg-warning fs-6">{{ $product->quantity }} low stock</span>
                                @else
                                    <span class="badge bg-danger fs-6">Out of stock</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Created</label>
                            <div>{{ $product->created_at->format('M d, Y \a\t H:i') }}</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Last Updated</label>
                            <div>{{ $product->updated_at->format('M d, Y \a\t H:i') }}</div>
                        </div>
                    </div>
                </div>
                
                @if($product->description)
                    <hr>
                    <div class="mb-3">
                        <label class="form-label text-muted">Description</label>
                        <div class="p-3 bg-light rounded">{{ $product->description }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-cogs me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Product
                    </a>
                    <a href="{{ route('categories.show', $product->category) }}" class="btn btn-info">
                        <i class="fas fa-tag me-2"></i>View Category
                    </a>
                    <a href="{{ route('products.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Add Similar Product
                    </a>
                    <hr>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" 
                                onclick="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                            <i class="fas fa-trash me-2"></i>Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar me-2"></i>Product Stats
                </h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="stats-number text-primary">{{ $product->quantity }}</div>
                        <div class="stats-label">In Stock</div>
                    </div>
                    <div class="col-6">
                        <div class="stats-number text-success">${{ number_format($product->price * $product->quantity, 2) }}</div>
                        <div class="stats-label">Total Value</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
