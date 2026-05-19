@extends('layouts.admin')

@section('content')
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Category Name</label>

                    <input type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter category name">

                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success mt-3">
                    <i class="fas fa-save"></i> Save
                </button>
            </form>
        </div>
@endsection