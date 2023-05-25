@extends('admin.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    <form class="forms-sample" action="{{ url('/category/update/'.$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="{{ $category->name ?? old('name') }}" class="form-control" id="name" placeholder="Category Name">
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                      </div>
                      
                      <div class="form-group">
                        <label>File upload</label>
                            <input type="file" name="editimage" class="form-control">
                            <img src="{{ asset('/category/'.$category->image) }}" height="100" width="100"/>

                            @if ($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
 </div>

@endsection
