@extends('backend.layouts.dashboard')

@section('title', 'Transaction Details')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Transaction Details</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table">
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">ID :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $transaction->id }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">Name :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $transaction->product_name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">Quantity :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $transaction->qty }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">Total :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ $transaction->total }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <h6 class="card-title">Date :</h6>
                                </td>
                                <td>
                                    <p class="card-text text-muted mb-0">{{ \Carbon\Carbon::parse($transaction->created_at) }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-muted mb-0">Created At : {{ \Carbon\Carbon::parse($transaction->created_at)->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
