@extends('user_template.layouts.template')
@section('main-content')

<h2 style="margin-bottom: 3rem;">{{ $category->category_name }} - ({{ $category->product_count}})</h2>

<div class="row">
  @foreach ($products as $product)
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