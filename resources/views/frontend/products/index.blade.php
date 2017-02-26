@extends('frontend.layouts.app')

@section('content')
	
	<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="w3l_banner_nav_right_banner3_btm">
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/13.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Lara Shop</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Home & Living</h4>
					<ol>
						<li>sunt in culpa qui officia</li>
						<li>commodo consequat</li>
						<li>sed do eiusmod tempor incididunt</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/14.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Lara Shop</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Fashion</h4>
					<ol>
						<li>enim ipsam voluptatem officia</li>
						<li>tempora incidunt ut labore et</li>
						<li>vel eum iure reprehenderit</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/jvc.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Lara Shop</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Electronics</h4>
					<ol>
						<li>dolorem eum fugiat voluptas</li>
						<li>ut aliquid ex ea commodi</li>
						<li>magnam aliquam quaerat</li>
					</ol>
				</div>
				<div class="clearfix"> </div>
			</div>

@endsection

@section ('secondary_content')

<div class="banner">
		<div class="w3l_banner_nav_right">
			
			<div class="w3ls_w3l_banner_nav_right_grid">
				<h3>Popular Brands</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
				@if($category)
					<h6>{{$category->title}}</h6>
				@else	
					<h6>Products All</h6>
				@endif

				@if ( count($products) > 0 )	
					@foreach ($products as $product)
					<div class="col-md-3 w3ls_w3l_banner_left">

					
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="{{  route('frontend.product_details',$product->id) }}"><img src="{{url('/images/120x120/products/'.$product->image) }}"/></a>
											<p>{{ $product->title }}</p>
											<h4>${{ $product->price }} <span>$5.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
												<div class="my_button">
													<a class="button" href="{{ route('frontend.addtocart',$product->id) }}">Add to Cart</a>
												</div>

												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					@endforeach
					@else

						<h4>Products Not Found</h4>
				@endif	
					<div class="clearfix"> </div>
				</div>

				{{ $products->links() }}
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

@endsection