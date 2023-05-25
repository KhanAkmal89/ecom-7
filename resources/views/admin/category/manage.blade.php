@extends('admin.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Manage Category</h4>
                        <table class="table table-bordered">
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->status ==1)
                                        <span>Active</span>
                                        @else
                                        <span>Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('/category/'.$category->image) }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ url ('/category/edit/'.$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ url ('/category/delete/'.$category->id) }}" onclick="return confirm('Are you sure delete this data')" class="btn btn-sm btn-danger">Delete</a>
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
