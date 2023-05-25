@extends('admin.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Manage Brand</h4>
                        <table class="table table-bordered">
                                <tr>
                                    <th>Sl</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($brands as $brand)
                                    
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ ($brand->category?->name) }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->status ==1)
                                        <span>Active</span>
                                        @else
                                        <span>Inactive</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ url ('/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ url ('/brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure delete this data')" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach       
                        </table>
                        {{ $brands->links() }}
                  </div>
                </div>
              </div>
        </div>
 </div>

@endsection
