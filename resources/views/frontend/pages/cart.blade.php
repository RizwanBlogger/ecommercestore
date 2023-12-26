@extends('frontend.layout.master')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
            @if($cartitem->count()>0)
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $total=0; ?>
                        @foreach($cartitem as $item)
						<?php $total += $item->getProduct->productprice * $item->product_qty; ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset('/image/product/'.$item->getProduct->image)}}" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item->getProduct->productname ?? ''}}</a></h4>

							</td>
							<td class="cart_price">
								<p>${{$item->getProduct->productprice ?? ''}}</p>
							</td>
                            @if($item->getProduct->qty > $item->product_qty)
							<td class="cart_quantity">
								<div class="cart_quantity_button">

									<input class="cart_quantity_input" readyonly type="text" name="product_qty" value="{{$item->product_qty ?? ''}}" autocomplete="off" size="2">

								</div>
							</td>
                            @else
                            <td>
                                <span>Out of stock</span>
                            </td>
                            @endif
							<td class="cart_total">
								<p class="cart_total_price">${{$item->getProduct->productprice * $item->product_qty}}</p>
							</td>
							<td class="cart_delete">
							<a class="cart_quantity_delete" data-id="{{ $item->id }}" data-action="{{ url('/customer/delete-cart-item',$item->getProduct->id) }}" onclick="deleteConfirmation({{ $item->id }})"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
					</tbody>
				</table>
				<div id="footer">
					<h3>Total Price : ${{ $total }}
					<a href="{{ url('/customer/checkout') }}" class="btn btn-success float-end" style="float:inline-end;">Processed to Checkout</a>
					</h3>
				</div>
			</div>
            @else
            <h2>Cart is Empty</h2>
            @endif
		</div>
	</section> <!--/#cart_items-->


@endsection

<script type="text/javascript">
    function deleteConfirmation(id) {
        swal.fire({
            title: 'Are you sure you want to delete',
            text: "Are you sure you want to delete",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then(function(e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/customer/delete-cart-item') }}/" + id,
                    data: {
                        _token: CSRF_TOKEN
                    },
                    dataType: 'JSON',
                    success: function(results) {
                        swal.fire({
                            title: "Done",
                            icon: 'success',
                            text: "Data Deleted Successfully",
                            type: "success"
                        }).then(function() {
                            location.reload();
                        });
                    }
                });

            } else {
                e.dismiss;
            }

        }, function(dismiss) {
            return false;
        })
    }
</script>
