@extends('layouts.admin')

@section('content')
<div class="container-fluid px-3 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0 font-weight-bold">Edit Product</h1>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Form ផ្ញើទៅកាន់ Route update ដោយភ្ជាប់ជាមួយ ID របស់ Product -->
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- សំខាន់ណាស់: Laravel ត្រូវការ @method('PUT') សម្រាប់រក្សាទុកទិន្នន័យកែប្រែ -->

                <!-- Product Name -->
                <div class="form-group mb-3">
                    <label for="name" class="font-weight-bold">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Price -->
                <div class="form-group mb-3">
                    <label for="price" class="font-weight-bold">Price ($) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Select Categories -->
                <div class="form-group mb-4">
                    <label class="font-weight-bold">Select Categories <span class="text-danger">*</span></label>
                    <div class="card p-3 @error('categories') border-danger @enderror" style="max-height: 200px; overflow-y: auto;">
                        @forelse($categories as $category)
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}" class="custom-control-input"
                                    {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) || (!old('categories') && $product->categories->contains($category->id)) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="category-{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @empty
                            <p class="text-muted m-0">No categories available.</p>
                        @endforelse
                    </div>
                    @error('categories')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success px-4">
                    <i class="fas fa-save"></i> Update Product
                </button>
            </form>
        </div>
    </div>
</div>
@endsection