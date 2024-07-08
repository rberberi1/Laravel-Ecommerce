@extends('user_template.layouts.template')
@section('main-content')
<h3 style="margin-bottom: 3rem;">Checkout</h3>
<div class="row">
  <div class="col-4">
    <div class="box_main">
      <h4>Address:</h4>
      <p>Phone- {{$shipping_address->phone_number}}</p>
      <p>City- {{$shipping_address->city}}</p>
      <p>Postal Code- {{$shipping_address->postal_code}}</p>
    </div>
  </div>

  <div class="col-8">
    <div class="box_main">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th></th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
          @php
              $total=0;
          @endphp
          @foreach ($cart_items as $item)
              <tr>
                @php
                   $product_name=App\Models\Product::where('id', $item->product_id)->value('product_name');
                   $product_img=App\Models\Product::where('id', $item->product_id)->value('product_img');
                @endphp
                <td style="text-align: left; vertical-align: middle;"><img style="height: 10rem;" src="{{ asset($product_img) }}"></td>
                <td style="text-align: left; vertical-align: middle;">{{ $product_name }}</td>
                <td style="text-align: left; vertical-align: middle;">{{ $item->quantity }}</td>
                <td style="text-align: left; vertical-align: middle;">{{ $item->price }}</td>
              </tr>

              @php
                  $total=$total + $item->price;
              @endphp

          @endforeach

          <tr>
            <td></td>
            <td></td>
            <td>Total</td>
            <td>{{$total}}</td>
            
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div style="display: flex; gap: 1rem;">
    <form action="{{ route('placeorder') }}" method="post">
      @csrf
      <input type="submit" value="Place Order" class="btn btn-primary">
    </form>
  
    <form action="" method="post">
      @csrf
      <input type="submit" value="Cancel" class="btn btn-danger">
    </form>
  </div>
  

</div>
@endsection()