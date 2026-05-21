@extends('layouts.admin')

@section('content')
<div class="container-fluid px-3 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0 font-weight-bold">Add New Product</h1>

        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- IMPORTANT -->
            <form action="{{ route('admin.product.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- LEFT SIDE -->
                    <div class="col-md-6">

                        <!-- Product Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold">
                                Product Name <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Enter product name">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Product Price -->
                        <div class="form-group mb-3">
                            <label for="price" class="font-weight-bold">
                                Price ($) <span class="text-danger">*</span>
                            </label>

                            <input type="number"
                                step="0.01"
                                name="price"
                                id="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}"
                                placeholder="0.00">

                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">

    <label class="font-weight-bold">
        Product Stock
    </label>

    <input type="number"
        name="stock"
        class="form-control"
        min="0"
        placeholder="Enter stock quantity"
        required>

</div>

                        <!-- Product Image -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Image</label>

                            <input type="file"
                                name="image"
                                class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Product Image 1 -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Image 1</label>

                            <input type="file"
                                name="image1"
                                class="form-control @error('image1') is-invalid @enderror">

                            @error('image1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Product Image 2 -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Image 2</label>

                            <input type="file"
                                name="image2"
                                class="form-control @error('image2') is-invalid @enderror">

                            @error('image2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>

                    <!-- RIGHT SIDE -->
                    <div class="col-md-6">

                        <!-- Categories -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">
                                Select Categories
                                <span class="text-danger">*</span>
                            </label>

                            <div class="card p-3 @error('categories') border-danger @enderror"
                                style="max-height: 300px; overflow-y: auto;">

                                @forelse($categories as $category)

                                    <div class="custom-control custom-checkbox mb-2">

                                        <input type="checkbox"
                                            name="categories[]"
                                            value="{{ $category->id }}"
                                            id="category-{{ $category->id }}"
                                            class="custom-control-input"
                                            {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}>

                                        <label class="custom-control-label"
                                            for="category-{{ $category->id }}">

                                            {{ $category->name }}

                                        </label>

                                    </div>

                                @empty

                                    <p class="text-muted m-0">
                                        No categories available.
                                    </p>

                                @endforelse

                            </div>

                            @error('categories')
                                <small class="text-danger d-block mt-1">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-save"></i> Save Product
                </button>

            </form>

        </div>
    </div>
</div>
@endsection