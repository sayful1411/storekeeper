@extends('backend.layouts.dashboard')

@section('title', 'Edit Product')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit Product</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('products.index') }}">
                                <button class="btn btn-dark">All Product</button>
                            </a>
                        </div>
                    </div>
                </div><!-- end card header -->
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            value="{{ old('name', $product->name) }}">
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="price" class="form-label">Price</label>
                                        <input name="price" type="number" class="form-control" id="price"
                                            value="{{ old('price', $product->price) }}">
                                    </div>
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="stock" class="form-label">Quantity</label>
                                        <input name="stock" type="number" class="form-control" id="stock"
                                            value="{{ old('stock', $product->stock) }}">
                                    </div>
                                    @error('stock')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end row-->
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="description" class="form-label">Description</label>
                                    </div>
                                    <div>
                                        <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ old('name', $product->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="btn btn-outline-info waves-effect waves-light">Update Product</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
