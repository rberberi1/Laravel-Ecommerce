@extends('user_template.layouts.template')
@section('main-content')
<div class="container" style="margin-bottom: 8rem;">
  <div class="row">
    <div class="col-lg-4">
      <div class="box_main">
        <img style="height: 20rem;" src="{{ asset($product->product_img) }}">
      </div>
    </div>
    <div class="col-lg-8">
      <div class="box_main">
        <div class="product-info">
          <h4 class="text-left">{{ $product->product_name }}</h4>
          <p class="price_text text-left">Price <span style="color:#262626">$ {{ $product->price }}</span></p>
        </div>
        <div class="my-3 product-details">
            <p classs="lead">{{ $product->product_long_des }}</p>
              <ul class="p-2 bg-light my-2">
                <li>Category- {{ $product->product_category_name }}</li>
                <li>Sub Category- {{ $product->product_subcategory_name }}</li>
                <li>Available quantity- {{ $product->quantity }}</li>
              </ul>
        </div>
        <div style="display: flex; justify-content: space-around; margin-top: 1rem;">
          <form action="{{route('addproducttocart')}}" method="post">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="product_id">
            <input type="hidden" value="{{ $product->price }}" name="price">
            <label for="quantity">Quantity</label>
            <input type="number" min='1' placeholder='1' name="quantity">
            <br>
            <input class="btn btn-small btn-warning" type="submit" value="Add To Cart">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <h1>Related Products</h1>
  @foreach ($relatedproducts as $product)
  <div class="col-lg-4 col-sm-4">
    <div class="box_main" style="margin-bottom: 5rem;">
      <h4>{{ $product->product_name }}</h4>
      <p class="price_text">Price <span style="color:#262626">$ {{ $product->price }}</span></p>
      <div style="display: flex; justify-content: center; align-items: center;">
        <img style="height: 20rem;" src="{{ asset($product->product_img) }}">
      </div>
      <div style="display: flex; justify-content: space-around; margin-top: 1rem;">
        <form action="{{route('addproducttocart')}}" method="post">
          @csrf
          <input type="hidden" value="{{ $product->id }}" name="product_id">
          <input type="hidden" value="{{ $product->price }}" name="price">
          <input type="hidden" value="1" name="quantity">
          <input class="btn btn-small btn-primary" type="submit" value="Buy Now">
        </form>
        <div>
          <a href="{{ route('singleproduct', [$product->id, $product->slug] )}}" class="btn btn-small btn-dark" style="margin-right: 2rem;">View</a>
        </div>
      </div>
    </div>
  </div>    
  @endforeach
</div>
@endsection()