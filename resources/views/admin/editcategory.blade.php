@extends('admin.layouts.template')
@section('page_title')
Edit Category
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
<form action="{{  route('updatecategory')  }}" method="post">
  @csrf
  <input type="hidden" value="{{  $category_info->id  }}" name="category_id">
  <h2>Edit Category</h2><hr>
  

  <div class="row mb-3">
    <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category_info->category_name}}">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Edit Category</button>
</form>
</div>
@endsection