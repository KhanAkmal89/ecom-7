@extends('admin.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form class="forms-sample" action="{{ url('/product/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Product Name">
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="category_id">Select A Category</label>
                        <select class="form-control" name="category_id">
                          <option disabled selected>Select A Category</option>
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="category_id">Select A Brand</label>
                        <select class="form-control" name="brand_id">
                          <option disabled selected>Select A Brand</option>
                          @foreach ($brands as $brand)
                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('brand_id'))
                            <div class="text-danger">{{ $errors->first('brand_id') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="Product Price">
                        @if ($errors->has('price'))
                            <div class="text-danger">{{ $errors->first('price') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" value="{{ old('qty') }}" class="form-control" id="qty" placeholder="Product Qty">
                        @if ($errors->has('qty'))
                            <div class="text-danger">{{ $errors->first('qty') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" name="short_description" id="short_description" rows="8" placeholder="Product Short Description"></textarea>
                        @if ($errors->has('short_description'))
                            <div class="text-danger">{{ $errors->first('short_description') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea class="ckeditor form-control" name="long_description" id="long_description" rows="8" placeholder="Product Long Description"></textarea>
                        @if ($errors->has('long_description'))
                            <div class="text-danger">{{ $errors->first('long_description') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="image">Main Image</label>
                        <input type="file" name="image" class="form-control" id="image" />
                        @if ($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="gallery_image">Gallery Image</label>
                        <input type="file" name="gallery_image[]" multiple class="form-control" id="gallery_image" />
                        @if ($errors->has('gallery_image'))
                            <div class="text-danger">{{ $errors->first('gallery_image') }}</div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="type">Select A Type</label>
                        <select class="form-control" name="type">
                          <option disabled selected>Select A Type</option>
                          <option value="new">New Arrival</option>
                          <option value="top">Top Product</option>
                          <option value="discount">Discount Product</option>
                        </select>
                        @if ($errors->has('type'))
                            <div class="text-danger">{{ $errors->first('type') }}</div>
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

@push('script')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endpush
