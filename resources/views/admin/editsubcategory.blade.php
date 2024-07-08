@extends('admin.layouts.template')
@section('page_title')
Edit Sub Category
@endsection
@section('content')
<div class="container">
<form action="{{ route('updatesubcategory') }}" method="post">
  @csrf
  <input type="hidden" value="{{$subcatinfo->id}}" name="subcategoryid">
  <h2>Edit Sub Category</h2><hr>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Sub Category Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" value="{{$subcatinfo->subcategory_name}}">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Edit Sub Category</button>
</form>
</div>
@endsection