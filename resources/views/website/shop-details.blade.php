
@extends('website.layouts.app')

@section('content')
    <!-- Breadcrumb Section Begin -->

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('storage/'.$shopDetail->banner_image) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                          {!! breadcrumbs() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb Section End -->
    <!-- Product Details Section Begin -->

    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset('storage/'.$product_detail->image ) }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="{{asset('asset/img/product/details/thumb-1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product_detail->product_name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">${{$product_detail->price}}</div>
                        <p>{{$product_detail->product_name}}</p><div class="product__details__quantity" style="display: flex; flex-direction: row; align-items: center; gap: 10px;">
                            <!-- Quantity Section -->
                            
                        
                            <!-- Add to Cart Button -->
                            <form action="{{ route('add-to-cart', $product_detail->id) }}" method="POST" style="display: flex; justify-content: center; width: auto;">
                                <div class="quantity" style="width: auto; text-align: center;">
                                    <div class="pro-qty">
                                        <input type="text" class="cart-quantity-input" value="1" min="1" max="{{ intval($product_detail->availability) }}" name="qty" style="width: 50px; padding: 5px; font-size: 14px;">
                                    </div>
                                </div>
                                @csrf
                                <button type="submit" class="primary-btn"  style="padding: 5px 15px; font-size: 14px;">
                                    ADD TO CART
                                </button>
                            </form>
                            @php
                            $favorite = session()->get('favorite', []);
                             @endphp
                            <!-- Heart Icon -->
                            <a href="{{ route('add-favorite', ['p_id' => $product_detail->id]) }}" class="heart-icon" style="text-align: center; width: auto;">
                                <span class="icon_heart_alt" style="font-size: 24px; @if(array_key_exists($product_detail->id, $favorite)) color: red; @endif"></span>
                            </a> 
                        </div>
                        <ul>
                            <li><b>Availability</b> <span>@if ($product_detail->availability >0)
                                In Stock
                                @else
                                Out Of Stock
                            @endif </span></li>
                            <li><b>Shipping</b> <span>{{$product_detail->Shipping}} day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                  {!! $product_detail->description !!}
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    {!! $product_detail->information !!}
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    Not Reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_product as $irelated_product )
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/'.$irelated_product->image ) }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="{{route('add-favorite',["p_id"=>$irelated_product->id])}}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li>
                                    <form action="{{ route('add-to-cart', $irelated_product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-dark">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{route('shop-details',["id"=>$irelated_product->id])}}">{{$irelated_product->product_name}}</a></h6>
                            <h5>{{$irelated_product->price}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {

    // Handle quantity input change
    $(document).on("change", ".cart-quantity-input", function () {
        var productId = $(this).closest("tr").data("product-id");
        var newQuantity = $(this).val();
        var maxStock = $(this).attr("max");

        // Check if the new quantity exceeds the available stock
        if (newQuantity > maxStock) {
            alert("Quantity cannot be more than available stock.");
            $(this).val(maxStock); // Reset to max stock value
            return;
        }  
    });

   

});
</script>
    @endsection 