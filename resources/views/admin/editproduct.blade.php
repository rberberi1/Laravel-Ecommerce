@extends('admin.layouts.template')
@section('page_title')
Edit Product
@endsection
@section('content')
<div class="container">
<form action="{{ route('updateproduct') }}" method="post">
  @csrf
  <input type="hidden" value="{{$productinfo->id}}" name="id">
  <h2>Edit Product</h2><hr>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $productinfo->product_name}}">
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="price" name="price" value="{{ $productinfo->price}}">
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Quantity</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $productinfo->quantity}}">
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Short Description</label>
    <div class="col-sm-10">
     <textarea class="form-control" name="product_short_des" id="product_short_des" cols="30" rows="10">{{ $productinfo->product_short_des}}</textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Long Description</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="product_long_des" id="product_long_des" cols="30" rows="10" >{{ $productinfo->product_long_des}}</textarea>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Update Product</button>
</form>
</div>
@endsection