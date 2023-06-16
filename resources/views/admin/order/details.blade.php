@extends('admin.master')

@section('content')
 <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Billing and Shipping Details</h4>
                    <a href="{{ url('download/pdf/'.$orderDetails->id) }}" class="btn btn-sm btn-success">Download PDF</a>
                        <div class="row">
                            <div class="col-md-3">Name : {{ $orderDetails->full_name }}</div>
                            <div class="col-md-3">Phone : {{ $orderDetails->phone }}</div>
                            <div class="col-md-3">Country : {{ $orderDetails->country }}</div>
                            <div class="col-md-3">City : {{ $orderDetails->city }}</div>
                            <div class="col-md-3">Street Address : {{ $orderDetails->street_address }}</div>
                            <div class="col-md-3">Post Code : {{ $orderDetails->post_code }}</div>
                            <div class="col-md-3">Total Price : {{ $orderDetails->total_price }}</div>
                            <div class="col-md-3">Total Qty : {{ $orderDetails->total_qty }}</div>
                        </div>

                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Details</h4>

                        <table class="table table-bordered">
                            <tr>
                                <td>Date</td>
                                <td>Product Name</td>
                                <td>Product Price</td>
                                <td>Product Qty</td>
                                <td>Product Image</td>
                            </tr>

                            @foreach ($orderDetails->orderDetails as $details)
                                <tr>
                                    <td>{{ $details->created_at->format('M d Y') }}</td>
                                    <td>{{ $details->product->name }}</td>
                                    <td>{{ $details->product->price }}</td>
                                    <td>{{ $details->product->qty }}</td>
                                    <td><img src="{{ asset('product/'.$details->product->image) }}" height="80" width="80"></td>
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
