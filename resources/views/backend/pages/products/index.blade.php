@extends('backend.layouts.dashboard')

@section('title', 'All Product')

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
                    <h4 class="card-title mb-0 flex-grow-1">All Product</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('products.create') }}">
                                <button class="btn btn-dark">Create Product</button>
                            </a>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">

                    <div class="live-preview">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 46px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="cardtableCheck">
                                                <label class="form-check-label" for="cardtableCheck"></label>
                                            </div>
                                        </th>
                                        <th scope="col">ID</th>
                                        <th scope="col" style="width: 600px;">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col" style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="cardtableCheck01">
                                                    <label class="form-check-label" for="cardtableCheck01"></label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="fw-medium">{{ $product->id }}</a></td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a href="{{ route('products.edit', $product->id) }}"
                                                        class="link-success">
                                                        <i class="ri-edit-box-line"></i>
                                                    </a>
                                                    <a class="link-success cursor-pointer" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal" data-product-id="{{ $product->id }}">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">No data found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    {{-- Delete Modal  --}}
    <div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <h4 class="fs-15">
                        Are you sure?
                    </h4>
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="{{ route('products.destroy', 'product_id') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="product_id" name="product_id" value="">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        var buttons = document.querySelectorAll('.link-success');

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var productId = this.getAttribute('data-product-id');
                document.getElementById('product_id').value = productId;
            });
        });
    </script>
@endsection
