@extends('frontend.layout.master')
@section('content')
<div class="container">
    <form action="{{ url('/customer/place-order') }}" method="post">
        @csrf
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Detail</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="fullName">Full Name</label>
                            <input type="text" name="name" value="{{ Auth::guard('customer')->user()->name ?? '' }}" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="fullName">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ Auth::guard('customer')->user()->email ?? '' }}" placeholder="Enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="fullName">Phone Number</label>
                            <input type="number" name="phonenumber" class="form-control" value="{{ Auth::guard('customer')->user()->phonenumber ?? '' }}" placeholder="Enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="fullName">Address 1</label>
                            <input type="text" name="address1" class="form-control" value="{{ Auth::guard('customer')->user()->address1 ?? '' }}" placeholder="Enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="fullName">Address 2</label>
                            <input type="text" name="address2" class="form-control" value="{{ Auth::guard('customer')->user()->address2 ?? '' }}" placeholder="Enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="fullName">City</label>
                            <input type="text" name="city" class="form-control" value="{{ Auth::guard('customer')->user()->city ?? '' }}" placeholder="Enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="fullName">State</label>
                            <input type="text" name="state" class="form-control" value="{{ Auth::guard('customer')->user()->state ?? '' }}" placeholder="Enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="fullName">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ Auth::guard('customer')->user()->country ?? '' }}" placeholder="Enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="fullName">Pin Code</label>
                            <input type="text" name="pincode" class="form-control" value="{{ Auth::guard('customer')->user()->pincode ?? '' }}" placeholder="Enter name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order Details</h6>
                    <hr>
                    @if($cartitem->count()>0)
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitem as $item)
                                <tr>
                                    <td><img src="{{ asset('/image/product/' . $item->getProduct->image) }}"
                                        width="50px" alt=""></td>
                                    <td>{{ $item->getProduct->productname ?? '' }}</td>
                                    <td>{{ $item->product_qty ?? ''}}</td>
                                    <td>${{ $item->getProduct->productprice ?? '' }}</td>
                                    <td>${{ $item->getProduct->productprice * $item->product_qty ?? '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button class="btn btn-primary float-end" style="float: inline-end;"> Place Order</button>
                    @else
                    <h2>Cart is Empty</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
