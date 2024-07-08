@extends('user_template.layouts.template')
@section('main-content')
    <h2 style="margin-bottom: 3rem;">Provide Your Address</h2>
    <div class="row">
      <div class="col-12">
        <div class="box_main">

          <form action="{{ route('addshippingaddress') }}" method="post">
            @csrf

            <div class="form-group">
              <label for="phone_number">Phone Number</label>
              <input type="text" class="form-control" name="phone_number">
            </div>

            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city">
            </div>

            <div class="form-group">
              <label for="postal_code">Postal Code</label>
              <input type="text" class="form-control" name="postal_code">
            </div>

            <input type="submit" value="Next" class="btn btn-dark">
            
          </form>
        </div>
      </div>
    </div>
@endsection