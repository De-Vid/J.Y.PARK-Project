@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">
            Update Category
        </h3>
    </div>

    <div class="card-body">

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Category Name</label>

        <input type="text"
            name="name"
            class="form-control"
            value="{{ $category->name }}"
            placeholder="Enter category name">

        @error('name')
        <small class="text-danger">
            {{ $message }}
        </small>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i>
    </button>

</form>

    </div>
</div>

@endsection