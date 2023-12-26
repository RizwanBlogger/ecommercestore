@extends('frontend.layout.master')
@section('content')
@include('frontend.include.slider')
<section>
		<div class="container">
			<div class="row">
				@include('frontend.include.sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($product as $data)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<img src="{{asset('/image/product/'.$data->image)}}">
											<h2>${{$data->productprice ?? ''}}</h2>
											<p>{{$data->productname ?? ''}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="{{url('product-detail/'.$data->id)}}"><i class="fa fa-plus-square"></i>Product Detail</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						
					</div><!--features_items-->
					
					
					
				
				</div>
			</div>
		</div>
	</section>
@endsection