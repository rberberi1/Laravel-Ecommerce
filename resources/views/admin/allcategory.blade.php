@extends('admin.layouts.template')
@section('page_title')
All Category
@endsection
@section('content')
<div class="container">
  <h2>All Categories</h2><hr>
  @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>

  @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Sub Category Cunt</th>
      <th scope="col">Slug</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
   
    <tr>
      <td>{{ $category-> id}}</td>
      <td>{{ $category-> category_name}}</td>
      <td>{{ $category-> subcategory_count}}</td>
      <td>{{ $category-> slug}}</td>
      <td>
        <a href="{{ route('editcategory', $category->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('deletecategory', $category->id) }}" class="btn btn-warning">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection