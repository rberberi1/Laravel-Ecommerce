@extends('admin.layouts.template')
@section('page_title')
All Sub Category
@endsection
@section('content')
<div class="container">
  <h2>All Sub Categories</h2><hr>
  @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>

  @endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Sub Category Name</th>
      <th scope="col">Category</th>
      <th scope="col">Product</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $allsubcategories as $subcategory )
      

    <tr>
      <td>{{$subcategory->id}}</td>
      <td>{{$subcategory->subcategory_name}}</td>
      <td>{{$subcategory->category_name}}</td>
      <td>{{$subcategory->product_count}}</td>
      <td>
        <a href="{{ route('editsubcategory', $subcategory->id )}}" class="btn btn-primary">Edit</a>
        <a href="{{ route('deletesubcategory', $subcategory->id)}}" class="btn btn-warning">Delete</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
@endsection