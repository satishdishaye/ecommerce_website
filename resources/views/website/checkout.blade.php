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

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="{{route('shoping-card')}}">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ route('post-checkout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <!-- Billing Information -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" value="{{ old('country') }}" required>
                                @error('country')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" placeholder="Street Address" class="checkout__input__add" value="{{ old('address') }}" required>
                                <input type="text" name="address_line_2" placeholder="Apartment, suite, unit, etc. (optional)" value="{{ old('address_line_2') }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city" value="{{ old('city') }}" required>
                                @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state" value="{{ old('state') }}" required>
                                @error('state')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postcode" value="{{ old('postcode') }}" required>
                                @error('postcode')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="order_notes" value="{{ old('order_notes') }}" placeholder="Notes about your order, e.g. special notes for delivery.">
                                @error('order_notes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach ($product_details as $item)
                                        <li>{{ $item->product_name }} <span>${{$item->price  * $cart[$item->id]['quantity']}}</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>${{ $SubtotalAmount }}</span></div>
                                <div class="checkout__order__total">Total <span>${{ $totalAmount }}</span></div>
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Cart Data -->
                    @foreach ($product_details as $item)
                        <input type="hidden" name="cart[{{ $item->product_id }}][product_id]" value="{{ $item->id }}">
                        <input type="hidden" name="cart[{{ $item->product_id }}][quantity]" value="{{$cart[$item->id]['quantity'] }}">
                        <input type="hidden" name="cart[{{ $item->product_id }}][price]" value="{{ $item->price }}">
                    @endforeach
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
