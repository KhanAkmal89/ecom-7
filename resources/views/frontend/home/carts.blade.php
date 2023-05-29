@extends('frontend.master')

@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>
                                    @php
                                        $sum = 0;
                                    @endphp
									<tbody>
                                    @foreach ($cart as $data)
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="{{ asset('product/'.$data->product?->image) }}" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="#">{{ $data->product?->name }}</a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">${{ $price = $data?->price }}</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <form action="{{ url('/cart-update/'.$data->id) }}" method="post">
                                                        @csrf
                                                        <input type="number" name="qty" class="form-control" value="{{ $qty = $data?->qty }}" min="1" max="10" step="1" data-decimals="0" required>
                                                        <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
			            			                 </form>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">${{ $subtotal = $price*$qty }}</td>
											<td class="remove-col"><a href="{{ url('/remove/cart/product/'.$data->id) }}" class="btn-remove"><i class="icon-close"></i></a></td>
										</tr>
										<tr>
                                        @php
                                            $sum += $subtotal
                                        @endphp
                                    @endforeach
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			<div class="cart-discount">
			            				<form action="#">
			            					<div class="input-group">
				        						<input type="text" class="form-control" required placeholder="coupon code">
				        						<div class="input-group-append">
													<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
												</div><!-- .End .input-group-append -->
			        						</div><!-- End .input-group -->
			            				</form>
			            			</div><!-- End .cart-discount -->

			            			<!-- <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a> -->
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>${{ $sum }}</td>
	                						</tr><!-- End .summary-subtotal -->

                                            <tr class="summary-total">
	                							<td>Total:</td>
	                							<td>${{ $sum }}</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="{{ ('/checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="{{ ('/') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
