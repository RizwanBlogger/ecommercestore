@extends('admin.layout.master')
@section('content')
<style>
    .btn.btn-primary{
        margin-top: 0px !important;
    }
</style>
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: blue;text-color: white;color: white;padding-left: 10px;padding-bottom: 5px;">
                    <h4 style="padding-top: 16px;">My Orders
                        <a href="{{ url('/admin/order-history') }}" style="float: inline-end; margin-bottom: 10px;margin-right: 10px;" class="btn btn-warning text-white ">Order History</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ date('d-m-Y',Strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_no ?? '' }}</td>
                                    <td>${{ $item->total_price ?? '' }}</td>
                                    <td>{{ $item->status == '0' ? 'pending':'complete' }}</td>
                                    <td><a href="{{ url('/admin/view-order/'.$item->id) }}" class="btn btn-primary">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
@endsection
