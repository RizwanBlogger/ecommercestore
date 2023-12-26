@extends('frontend.layout.master')
@section('content')
<section>
		<div class="container">
			<div class="row">
            @include('frontend.include.sidebar')
<div class="col-sm-9 padding-right">
			<div>
             @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            </div>
					<div class="product-details"><!--product-details-->
					<button type="button" class="btn btn-fefault cart">

										Add Rating
									</button>
						<div class="col-sm-5">
							<div class="view-product">
                            <img src="{{asset('/image/product/'.$product_detail->image)}}">

							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$product_detail->productname ?? ''}}</h2>
								<!-- <p>Web ID: 1089772</p> -->
								<img src="images/product-details/rating.png" alt="" />

								<span>
									<form action="{{url('customer/addtocart')}}" method="post">
										@csrf
									<span>$ {{$product_detail->productprice ?? ''}}</span>
                                    @if($product_detail->qty > 0)
									<label>Quantity:</label>

									<input type="number" value="0" min="1" max="{{$product_detail->qty ?? ''}}" name="product_qty" />
                                    @endif
									<input type="hidden" name="product_id" value="{{$product_detail->id}}">
									<input type="hidden" name="user_id" value="{{Auth::guard('customer')->id()}}">
                                    @if($product_detail->qty > 0)
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
                                    @endif
									</form>
								</span>
                                @if($product_detail->qty > 0)
								<p><b>Availability:</b> <span style="background-color:green;color:white;">In Stock</span></p>
                                @else
                                <p><b>Availability:</b> <span style="background-color:red;color:white;">out of Stock</span></p>
                                @endif
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>

							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->


					</div>
					</div>

				</div>
@endsection
