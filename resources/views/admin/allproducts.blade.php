@extends('admin.layouts.template')
@section('page_title')
All Products
@endsection
@section('content')
<div class="container">
  <h2>All Products</h2><hr>
  @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>

  @endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Img</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
    <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->product_name}}</td>
      <td>
        <img style=" height:100px;" src="{{asset($product->product_img)}}" alt="">
        <br>
        <a href="{{ route('editproductimg', $product->id) }}" class="btn btn-primary">Update Image</a>
      </td>
      <td>{{$product->price}}</td>
      <td>
        <a href="{{ route('editproduct', $product->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('deleteproduct', $product->id) }}" class="btn btn-warning">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection