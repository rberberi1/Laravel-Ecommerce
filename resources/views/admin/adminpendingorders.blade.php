@extends('admin.layouts.template')
@section('page_title')
Pending Orders
@endsection
@section('content')
<div class="container my-5">
  <div class="card p-4">
    <div class="card-title">
      <h2 class="text-center">Pending Orders</h2>
    </div>
    <div class="card-body">
     
      <table class="table">
        <tr>
          <th>User id</th>
          <th>Shipping info</th>
          <th>Product id</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        @foreach ($pending_orders as $order)
            <tr>
              <td>{{$order->userid}}</td>
              <td>
                <ul>
                  <li>Phone- {{$order->shipping_phone}}</li>
                  <li>City- {{$order->shipping_city}}</li>
                  <li>Postal Code- {{$order->shipping_postalcode}}</li>
                </ul>
              </td>
              <td>{{$order->product_id}}</td>
              <td>{{$order->quantity}}</td>
              <td>{{$order->total_price}}</td>
              <td>{{$order->status}}</td>
              <td><a href="" class="btn btn-success">Confirm</a></td>
            </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection