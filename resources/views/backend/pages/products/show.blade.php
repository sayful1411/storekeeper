@extends('backend.layouts.dashboard')

@section('title', 'Product Details')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Product Details</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table">
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">ID :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $product->id }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">Name :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $product->name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">Price :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $product->price }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">Quantity :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $product->stock }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">Description :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $product->description }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-muted mb-0">Created At : {{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
