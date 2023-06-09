@extends('admin.master')

@section('content')
 <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Today Orders</h4>
                        <table class="table table-bordered">
                                <tr>
                                    <th>Sl</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Category Name</th>
                                    <th>Total Qty</th>
                                    <th>Action</th>
                                </tr>
                                    @foreach ($todayOrders as $k => $todayOrder)
                                    <tr>
                                      <td>{{ $k+1 }}</td>
                                      <td>{{ $todayOrder->full_name }}</td>
                                      <td>{{ $todayOrder->phone }}</td>
                                      <td>{{ $todayOrder->total_price }}</td>
                                      <td>{{ $todayOrder->total_qty }}</td>
                                      <td>
                                          <a href="{{ url('/order/details/'.$todayOrder->id) }}" class="btn btn-sm btn-info">Details</a>
                                          <a href="{{ url('/order/delete/'.$todayOrder->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                      </td>
                                    </tr>
                                @endforeach

                        </table>

                  </div>
                </div>
              </div>
        </div>
  </div>

@endsection
