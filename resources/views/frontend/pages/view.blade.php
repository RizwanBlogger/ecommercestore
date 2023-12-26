@extends('frontend.layout.master')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: blue;text-color: white;color: white;padding-left: 10px;padding-bottom: 5px;">
                    <h2 class="text-white" style="    padding-top: 16px;" >Orders View
                        <a href="{{ url('/customer/my-order') }}" style="float: inline-end; margin-bottom: 10px;margin-right: 10px;" class="btn btn-warning text-white ">Back</a>
                    </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <div class="border p-2">{{ $orders->name }}</div>
                            <label for="">Contry</label>
                            <div class="border p-2">{{ $orders->country }}</div>
                            <label for="">State</label>
                            <div class="border p-2">{{ $orders->state }}</div>
                            <label for="">City</label>
                            <div class="border p-2">{{ $orders->city }}</div>
                            <label for="">Phone No</label>
                            <div class="border p-2">{{ $orders->phonenumber }}</div>
                            <label for="">address1</label>
                            <div class="border p-2">{{ $orders->address1 }}</div>
                            <label for="">Address2</label>
                            <div class="border p-2">{{ $orders->address2 }}</div>
                            <label for="">pinCode</label>
                            <div class="border p-2">{{ $orders->pincode }}</div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Quantitye</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    @foreach ($orders->orderitems as $item)
                                    <?php $total += $item->products->productprice * $item->qty; ?>
                                        <tr>
                                           <td>{{ $item->products->productname ?? '' }}</td>
                                           <td><img src="{{ asset('/image/product/' . $item->products->image)}}" height="40px" alt=""></td>
                                           <td>{{ $item->qty ?? '' }}</td>
                                           <td>${{ $item->products->productprice ?? '' }}</td>
                                           <td>${{ $item->products->productprice*$item->qty }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div id="footer">
                                <h3>Total Price : ${{ $orders->total_price }}</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
