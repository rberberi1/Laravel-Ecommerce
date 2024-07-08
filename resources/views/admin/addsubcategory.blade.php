@extends('admin.layouts.template')
@section('page_title')
Add Sub Category
@endsection
@section('content')
<div class="container">
<form action="{{ route('storesubcategory') }}" method="post">
  @csrf
  <h2>Add Sub Category</h2><hr>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Sub Category Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcategory_name" name="subcategory_name">
    </div>
  </div>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Select Category</label>
    <div class="col-sm-10">
      <select class="form-select" id="category_id" name="category_id">
        <option value="">Open this select menu</option>
        @foreach ($categories as $category )
        <option value="{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
       
      </select>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Add New Sub Category</button>
</form>
</div>
@endsection