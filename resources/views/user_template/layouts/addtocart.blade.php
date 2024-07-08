@extends('user_template.layouts.template')
@section('main-content')

@if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>

  @endif
  <div class="row">
    <div class="col-12">
      <div class="box_main">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th></th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Action</th>
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
                  <td style="text-align: left; vertical-align: middle;"><a href="{{ route('removeitem', $item->id) }}" class="btn btn-warning">Remove</a></td>
                </tr>

                @php
                    $total=$total + $item->price;
                @endphp

            @endforeach

            @if ($total >0)
            <tr>
              
              <td></td>
              <td></td>
              <td>Total</td>
              <td>{{$total}}</td>
              <td><a href="{{ route('shippingaddress') }}" class="btn btn-primary">Checkout</a></td>
              @endif
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection()