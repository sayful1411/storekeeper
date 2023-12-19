@extends('backend.layouts.dashboard')

@section('title', 'Sale Product')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sale Product</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('products.index') }}">
                                <button class="btn btn-dark">All Product</button>
                            </a>
                        </div>
                    </div>
                </div><!-- end card header -->
                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="mb-3 col-xxl-8 col-md-6">
                                    <div>
                                        <label for="product_id" class="form-label text-muted">Products</label>
                                        <select class="form-select mb-3" id="product_id" name="product_id" aria-label="product_id">
                                            <option value="">select a product </option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('product_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label for="qty" class="form-label">Quantity</label>
                                        <input name="qty" type="number" class="form-control" id="qty"
                                            value="{{ old('qty') }}">
                                    </div>
                                    @error('qty')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end row-->
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="note" class="form-label">Note</label>
                                    </div>
                                    <div>
                                        <textarea class="form-control" name="note" id="" cols="30" rows="10">{{ old('note') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="btn btn-outline-info waves-effect waves-light">Sell
                                    Product</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
