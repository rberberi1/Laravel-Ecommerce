@extends('admin.layouts.template')
@section('page_title')
Add Category
@endsection
@section('content')
<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{  route('storecategory')  }}" method="post">
  @csrf
  <h2>Add Category</h2><hr>

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="category_name" name="category_name">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Add New Category</button>
</form>
</div>
@endsection