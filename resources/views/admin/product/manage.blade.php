@extends('admin.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Manage Product</h4>
                        <table class="table table-bordered">
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <!-- <th>Gallery Image</th> -->
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($products as $k => $product)
                                    <tr>
                                      <td>{{ $k+1 }}</td>
                                      <td>
                                          <img src="{{ asset('/product/'.$product->image) }}" height="100" width="100"/>
                                      </td>
                                      <!-- <td>
                                          @foreach (json_decode($product->gallery_image) as $gallery)
                                              <img src="{{ asset('/product/'.$gallery) }}" height="100" width="100"/>
                                          @endforeach
                                      </td> -->
                                      <td>{{ $product->name }}</td>
                                      <td>{{ $product->category?->name }}</td>
                                      <td>{{ $product->brand?->name }}</td>
                                      <td>{{ $product->price }}</td>
                                      <td>{{ $product->qty }}</td>
                                      <td>
                                          <a href="{{ url('/product/edit/'.$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                                          <a href="{{ url('/product/delete/'.$product->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
