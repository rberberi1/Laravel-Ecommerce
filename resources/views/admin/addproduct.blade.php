@extends('admin.layouts.template')
@section('page_title')
Add Product
@endsection
@section('content')
<div class="container">
<form action="{{ route('storeproduct') }}" method="post" enctype="multipart/form-data">
  @csrf
  <h2>Add Product</h2><hr>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="product_name" name="product_name">
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="price" name="price">
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Quantity</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="quantity" name="quantity">
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Short Description</label>
    <div class="col-sm-10">
     <textarea class="form-control" name="product_short_des" id="product_short_des" cols="30" rows="10"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Product Long Description</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="product_long_des" id="product_long_des" cols="30" rows="10"></textarea>
    </div>
  </div>


  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Select Category</label>
    <div class="col-sm-10">
      <select class="form-select" id="product_category_id" name="product_category_id">
        <option value="">Select Product Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
        
      </select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Select Sub Category</label>
    <div class="col-sm-10">
      <select class="form-select" id="product_subcategory_id" name="product_subcategory_id">
        <option value="">Select Product Sub Category</option>
        @foreach ($subcategories as $subcategory)
        <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Upload Product Image</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" id="product_img" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="product_img">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Add New Product</button>
</form>
</div>
@endsection