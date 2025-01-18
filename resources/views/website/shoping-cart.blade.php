@extends('website.layouts.app')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('asset/img/breadcrumb.jpg') }}">
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

<!-- Shopping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cartSubtotal=0;
                            @endphp
                            @foreach ($product_details as $iproduct_details)
                            <tr data-product-id="{{ $iproduct_details->id }}">
                                <td class="shoping__cart__item">
                                    <img src="{{ asset('storage/'.$iproduct_details->image ) }}" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                                    <h5>{{ $iproduct_details->product_name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{ $iproduct_details->price }}.00
                                </td>
                                <td class="shoping__cart__quantity">

                                    <div class="quantity" style="width: auto; text-align: center;">
                                        @php
                                        $sessionCart = session('cart');
                                            $sessionQty = isset($sessionCart[$iproduct_details->id]) ? $sessionCart[$iproduct_details->id]['quantity'] : 1;
                                        @endphp
                                
                                        <button 
                                            type="button" 
                                            onclick="updateQuantity(-1,'{{ $iproduct_details->id}}')" 
                                            style="width: 30px; height: 30px; font-size: 20px; text-align: center; line-height: 30px; background-color: #f1f1f1; border: 1px solid #ccc; cursor: pointer;">
                                            -
                                        </button>
                                        <input 
                                            type="number" 
                                            id="quantity_{{$iproduct_details->id}}" 
                                            class="cart-quantity-input" 
                                            value="{{ $sessionQty }}" 
                                            min="1" 
                                            max="{{ intval($iproduct_details->availability) }}" 
                                            name="qty" 
                                            style="width: 30px; height: 30px; font-size: 20px; text-align: center; line-height: 30px; background-color: #f1f1f1; border: 1px solid #ccc; cursor: pointer;"
                                        >
                                        <button 
                                            type="button" 
                                            onclick="updateQuantity(1,'{{ $iproduct_details->id}}')" 
                                            style="width: 30px; height: 30px; font-size: 20px; text-align: center; line-height: 30px; background-color: #f1f1f1; border: 1px solid #ccc; cursor: pointer;">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    <span class="total-price" id="total_price_{{ $iproduct_details->id }}">
                                        ${{ $iproduct_details->price * $cart[$iproduct_details->id]['quantity'] }}.00
                                    </span>
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close" data-product-id="{{ $iproduct_details->id }}"></span>
                                </td>
                            </tr>

                            @php
                            $cartSubtotal= $cartSubtotal + ($iproduct_details->price * $cart[$iproduct_details->id]['quantity']) ;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                     <a href="{{route('shop-grid')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount" id="discount-section">
                        <h5>Discount Codes</h5>
                        <form action="{{route('apply-coupon')}}" method="GET">        
                            <input type="text" name="code" value="{{session('coupon_code')}}" placeholder="Enter your coupon code">
                            @if (session('coupon'))    <button type="submit" style="background-color: red;" class="site-btn">Remove COUPON </button>
                            @else
                            <button type="submit" class="site-btn">Apply COUPON </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>

                        <li>Subtotal <span id="cart-subtotal">${{ $cartSubtotal }} </span></li>
                        <div id="coupon-section">
                            @if (session('coupon'))
                                <li>Coupon Discount <span>${{ $cartSubtotal * session('coupon') / 100 }}</span></li>
                            @endif
                        </div>                        <li>Total <span id="cart-total">${{ $cartSubtotal- $cartSubtotal *session('coupon')/100  }}</span></li>
                    </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updateQuantity(change, productId) {

        $('#coupon-section').remove(); // Remove the coupon section temporarily
       

        $('#discount-section').html(`
            <div class="shoping__continue">
                <div class="shoping__discount">
                    <h5>Discount Codes</h5>
                    <form action="{{ route('apply-coupon') }}" method="GET">
                        <input type="text" name="code" placeholder="Enter your coupon code">
                       
                            <button type="submit" class="site-btn">Apply  COUPON</button>
                        
                    </form>
                </div>
            </div>
        `);

        const input = document.getElementById('quantity_' + productId);

        let newQuantity = parseInt(input.value) || 1;
        const max = parseInt(input.getAttribute('max')) || Infinity;

        // Update value within bounds
        newQuantity += change;
        if (newQuantity < 1) newQuantity = 1;
        if (newQuantity > max) newQuantity = max;

        input.value = newQuantity;

        // Send the updated quantity via AJAX
        $.ajax({
            url: '/update-cart',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: newQuantity,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response.updatedTotalPrice) {
                    $("#total_price_" + productId).text('$' + response.updatedTotalPrice + '.00');
                }
                if (response.updatedCartTotal) {
                    $('#cart-total').text('$' + response.updatedCartTotal + '.00');
                }
                if (response.updatedSubCartTotal) {
                    $('#cart-subtotal').text('$' + response.updatedSubCartTotal + '.00');
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("There was an error updating the cart. Please try again.");
            }
        });
    }
</script>

<script>
$(document).ready(function () {
    $(document).on("click", ".icon_close", function () {
        var productId = $(this).data("product-id");

        $('#coupon-section').remove(); // Remove the coupon section temporarily
       

       $('#discount-section').html(`
           <div class="shoping__continue">
               <div class="shoping__discount">
                   <h5>Discount Codes</h5>
                   <form action="{{ route('apply-coupon') }}" method="GET">
                       <input type="text" name="code" placeholder="Enter your coupon code">
                      
                           <button type="submit" class="site-btn">Apply  COUPON</button>
                       
                   </form>
               </div>
           </div>
       `);

        $.ajax({
            url: '/remove-from-cart',
            method: 'POST',
            data: {
                product_id: productId,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                $("tr[data-product-id='" + productId + "']").remove();

                if (response.updatedCartTotal) {
                    $('#cart-total').text('$' + response.updatedCartTotal + '.00');
                }else{
                    $('#cart-total').text('$0.00');
  
                }

                if (response.updatedCartTotal) {
                    $('#cart-subtotal').text('$' + response.updatedCartTotal + '.00');
                }else{
                    $('#cart-subtotal').text('$0.00');

                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
               
            }
        });
    });

});
</script>
@endsection
