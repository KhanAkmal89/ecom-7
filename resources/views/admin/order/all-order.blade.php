@extends('admin.master')

@section('content')
 <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Orders</h4>
                        <table class="table table-bordered">
                                <tr>
                                    <th>Sl</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Total Price</th>
                                    <th>Total Qty</th>
                                    <th>Action</th>
                                </tr>
                                    @foreach ($allOrders as $k => $allOrder)
                                    <tr>
                                      <td>{{ $k+1 }}</td>
                                      <td>{{ $allOrder->full_name }}</td>
                                      <td>{{ $allOrder->phone }}</td>
                                      <td>{{ $allOrder->total_price }}</td>
                                      <td>{{ $allOrder->total_qty }}</td>
                                      <td>
                                          <a href="{{ url('/order/details/'.$allOrder->id) }}" class="btn btn-sm btn-info">Details</a>
                                          <a href="{{ url('/order/delete/'.$allOrder->id) }}" class="btn btn-sm btn-danger">Delete</a>
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

