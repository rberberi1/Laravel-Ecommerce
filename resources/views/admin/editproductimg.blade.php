@extends('admin.layouts.template')
@section('page_title')
Edit Product Image
@endsection
@section('content')
<div class="container">
<form action="{{ route('updateproductimg') }}" method="post" enctype="multipart/form-data">
  @csrf
  <h2>Edit Product Image</h2><hr>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Previous Image</label>
    <div class="col-sm-10">
      <img src="{{asset($productinfo->product_img)}}" alt="">
    </div>
  </div>

  <input type="hidden" value="{{$productinfo->id}}" name="id">

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Upload New Image</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" id="product_img" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="product_img">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Update Product Image</button>
</form>
</div>
@endsection