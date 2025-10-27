@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-box me-3"></i>Products
            </h1>
            <p class="text-muted mb-0">Manage your product inventory</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Product
        </a>
    </div>
</div>

@if($products->count() > 0)
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">{{ $products->count() }}</div>
                <div class="stats-label">Total Products</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">{{ $products->sum('quantity') }}</div>
                <div class="stats-label">Total Quantity</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">${{ number_format($products->sum('price'), 2) }}</div>
                <div class="stats-label">Total Value</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">{{ $products->where('quantity', 0)->count() }}</div>
                <div class="stats-label">Out of Stock</div>
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
                                <i class="fas fa-box me-2"></i>Product
                            </th>
                            <th class="border-0">
                                <i class="fas fa-barcode me-2"></i>SKU
                            </th>
                            <th class="border-0">
                                <i class="fas fa-tag me-2"></i>Category
                            </th>
                            <th class="border-0">
                                <i class="fas fa-dollar-sign me-2"></i>Price
                            </th>
                            <th class="border-0">
                                <i class="fas fa-layer-group me-2"></i>Stock
                            </th>
                            <th class="border-0">
                                <i class="fas fa-cogs me-2"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <span class="badge bg-primary">#{{ $product->id }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                            <i class="fas fa-box text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $product->name }}</div>
                                            @if($product->description)
                                                <small class="text-muted">{{ Str::limit($product->description, 30) }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <code class="bg-light px-2 py-1 rounded">{{ $product->sku }}</code>
                                </td>
                                <td>
                                    <a href="{{ route('categories.show', $product->category) }}" class="text-decoration-none">
                                        <span class="badge bg-info">{{ $product->category->name }}</span>
                                    </a>
                                </td>
                                <td>
                                    <span class="fw-bold text-success">${{ number_format($product->price, 2) }}</span>
                                </td>
                                <td>
                                    @if($product->quantity > 10)
                                        <span class="badge bg-success">{{ $product->quantity }} in stock</span>
                                    @elseif($product->quantity > 0)
                                        <span class="badge bg-warning">{{ $product->quantity }} low stock</span>
                                    @else
                                        <span class="badge bg-danger">Out of stock</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning" title="Edit Product">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this product?')" 
                                                    title="Delete Product">
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
        {{ $products->links() }}
    </div>
@else
    <div class="card">
        <div class="card-body">
            <div class="empty-state">
                <i class="fas fa-box"></i>
                <h4>No Products Found</h4>
                <p>Get started by creating your first product.</p>
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create First Product
                </a>
            </div>
        </div>
    </div>
@endif
@endsection
