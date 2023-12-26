@extends('frontend.layout.master')
@section('content')
@extends('frontend.layout.master')
@section('content')
<style>
    .btn.btn-primary{
        margin-top: 0px !important;
    }
</style>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: blue;text-color: white;color: white;padding-left: 10px;padding-bottom: 5px;">
                    <h4 style="padding-top: 16px;">My Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-Y',Strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_no ?? '' }}</td>
                                    <td>${{ $item->total_price ?? '' }}</td>
                                    <td>{{ $item->status == '0' ? 'pending':'complete' }}</td>
                                    <td><a href="{{ url('/customer/view-order/'.$item->id) }}" class="btn btn-primary">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@endsection
