
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
                                                        
                            <div class="quantity" style="width: auto; text-align: center;">
                                    @php
                                    $sessionCart = session('cart');
                                        $sessionQty = isset($sessionCart[$product_detail->id]) ? $sessionCart[$product_detail->id]['quantity'] : 1;
                                    @endphp
                            
                                    <button 
                                        type="button" 
                                        onclick="updateQuantity(-1,'{{ $product_detail->id}}')" 
                                        style="width: 30px; height: 30px; font-size: 20px; text-align: center; line-height: 30px; background-color: #f1f1f1; border: 1px solid #ccc; cursor: pointer;">
                                        -
                                    </button>
                                    <input 
                                        type="number" 
                                        id="quantity" 
                                        class="cart-quantity-input" 
                                        value="{{ $sessionQty }}" 
                                        min="1" 
                                        max="{{ intval($product_detail->availability) }}" 
                                        name="qty" 
                                        style="width: 30px; height: 30px; font-size: 20px; text-align: center; line-height: 30px; background-color: #f1f1f1; border: 1px solid #ccc; cursor: pointer;"
                                    >
                                    <button 
                                        type="button" 
                                        onclick="updateQuantity(1,'{{ $product_detail->id}}')" 
                                        style="width: 30px; height: 30px; font-size: 20px; text-align: center; line-height: 30px; background-color: #f1f1f1; border: 1px solid #ccc; cursor: pointer;">
                                        +
                                    </button>
                                </div>
                                

                              
                                <button 
                                    onclick="toggleCart({{ $product_detail->id }}, this)" 
                                    class="primary-btn add-to-cart-btn" 
                                    style="padding: 5px 15px; font-size: 14px;  @if(array_key_exists($product_detail->id, session()->get('cart', []))) background-color: red; @else  background-color: green; @endif"   color: white;"
                                >
                                @if(array_key_exists($product_detail->id, session()->get('cart', []))) REMOVE @else  ADD TO CART @endif
                                   
                                </button>
                         

                            <!-- Heart Icon -->
                            <a onclick="addToFavorite({{ $product_detail->id }}, this)" class="heart-icon" style="text-align: center; width: auto;">
                                <span>  <i class="fa fa-heart" 
                                    style="@if(array_key_exists($product_detail->id, session()->get('favorite', []))) color: red; @endif">
                                 </i></span>
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
                                <li><a onclick="addToFavorite({{ $irelated_product->id }}, this)"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li>
                                    <button onclick="addToCart({{ $irelated_product->id }}, this)"class="btn btn-outline-dark">
                                        <i class="fa fa-shopping-cart"  style="@if(array_key_exists($irelated_product->id, session()->get('cart', []))) color: green; @endif"></i>
                                    </button>
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
        function updateQuantity(change ,id) {
            const input = document.getElementById('quantity');
            let currentValue = parseInt(input.value) || 1;
            const max = parseInt(input.getAttribute('max')) || 1;
    
            // Update value within bounds
            currentValue += change;
            if (currentValue < 1) currentValue = 1;
            if (currentValue > max) currentValue = max;
    
            input.value = currentValue;


            fetch("{{route('change-qty')}}",{
                method: 'POST',
                headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                          },
                body: JSON.stringify({
                       p_id:id,
                       qty:currentValue
                        })     
            }).then(response=>response.json())
              .then(data=>{
                console.log(data);
              })
              .catch(error=>console.error('Error:', error));

    
        }
    </script>
    
<script>
    function toggleCart(productId, element) {
        const isAdding = element.textContent.trim() === 'ADD TO CART'; // Check current state
        const qtyInput = document.querySelector('.cart-quantity-input');
        const quantity = qtyInput ? parseInt(qtyInput.value) || 1 : 1;

        fetch("{{ route('add-to-cart') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ 
                p_id: productId, 
                qty: quantity,
                action: isAdding ? 'add' : 'remove' 
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Toggle button text and color
                element.textContent = isAdding ? 'REMOVE' : 'ADD TO CART';
                element.style.backgroundColor = isAdding ? 'red' : 'green';

                const countElement = document.getElementById('cart-count');
                if (countElement) {
                    countElement.textContent = data.cart;  
                }

                toastr.success(data.message, data.message, {
                    timeOut: 2000,  
                });
            } else {
                toastr.error(data.message, data.message, {
                    timeOut: 2000,  
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to update cart. Please try again.');
        });
    }

    
</script>

    @endsection 