@extends('user_template.layouts.template')
@section('main-content')


<section id="billboard" class="bg-grey overflow-hidden">
  <div class="swiper main-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background: url('{{ asset('home/images/banner-image-1.jpg') }}') center center / cover no-repeat;">
        <div class="banner-content">
          <div class="container">
            <div class="row justify-content-end">
              <div class="text-content content-light col-md-6" data-aos="fade">
                <h4 class="subtitle text-uppercase">Best Quality</h4>
                <h1 class="banner-title text-uppercase"><a href="#">Best Jewellery</a></h1>
                <p>Get 10% Discount on this festivals sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Labore et dolore magna aliqua tempor.</p>
                <div class="btn-left">
                  <a href="#" class="btn btn-medium btn-primary">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide" style="background: url('{{ asset('home/images/banner-image-2.jpg') }}') center center / cover no-repeat;">
        <div class="banner-content">
          <div class="container">
            <div class="row justify-content-end">
              <div class="text-content col-md-6 col-md-offset-6" data-aos="fade">
                <h4 class="subtitle text-uppercase">Best Quality</h4>
                <h1 class="banner-title text-uppercase"><a href="#">Best Jewellery</a></h1>
                <p>Get 10% Discount on this festivals sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Labore et dolore magna aliqua tempor.</p>
                <div class="btn-left">
                  <a href="#" class="btn btn-medium btn-primary">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide" style="background: url('{{ asset('home/images/banner-earrings.jpg')}}') center center / cover no-repeat;">
        <div class="banner-content">
          <div class="container">
            <div class="row">
              <div class="text-content content-light col-md-6" data-aos="fade">
                <h4 class="subtitle text-uppercase">Best Quality</h4>
                <h1 class="banner-title text-uppercase"><a href="#">Best Jewellery</a></h1>
                <p>Get 10% Discount on this festivals sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Labore et dolore magna aliqua tempor.</p>
                <div class="btn-left">
                  <a href="#" class="btn btn-medium btn-primary">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide" style="background: url('{{ asset('home/images/banner-rings.jpg')}}') center center / cover no-repeat;">
        <div class="banner-content">
          <div class="container">
            <div class="row justify-content-end">
              <div class="text-content col-md-6 col-md-offset-6" data-aos="fade">
                <h4 class="subtitle text-uppercase">Best Quality</h4>
                <h1 class="banner-title text-uppercase"><a href="#">Best Jewellery</a></h1>
                <p>Get 10% Discount on this festivals sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Labore et dolore magna aliqua tempor.</p>
                <div class="btn-left">
                  <a href="#" class="btn btn-medium btn-primary">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>
<h1 class="py-5">All Products</h1>
<div class="row">
  @foreach ($allproducts as $product)
  <div class="col-lg-4 col-sm-4">
    <div class="box_main" style="margin-bottom: 5rem;">
      <h4>{{ $product->product_name }}</h4>
      <p class="price_text">Price <span style="color:#262626">$ {{ $product->price }}</span></p>
      <div style="display: flex; justify-content: center; align-items: center;">
        <img style="height: 20rem;" src="{{ asset($product->product_img) }}">
      </div>
     <div style="display: flex; justify-content:space-around; margin-top: 1rem;"> 
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


@endsection
