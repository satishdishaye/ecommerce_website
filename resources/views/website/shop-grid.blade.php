
@extends('website.layouts.app')

@section('content')
  

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('storage/'.$shop->banner_image) }}">
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
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>

                                @foreach ($allCategory as $iallCategory )
                                <li><a href="{{ route('shop-grid',['category'=>$iallCategory->id]) }}">{{ $iallCategory->category_name}}</a></li>
                                @endforeach
    
                            </ul>
                        </div>
                        <form id="price-filter-form" action="{{ route('shop-grid') }}" method="GET">
                            <div class="sidebar__item">
                                <h4>Price</h4>
                                <div class="price-range-wrap">
                                    <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                        data-min="10" data-max="540">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    </div>
                                    <div class="range-slider">
                                        <div class="price-input">
                                            <input type="text" id="minamount" name="minprice" value="10" readonly>
                                            <input type="text" id="maxamount" name="maxprice" value="50000" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($latestProduct as $iLatestProduct )
                                        <a href="{{route('shop-details',["id"=>$iLatestProduct->id])}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset('storage/'.$iLatestProduct->image ) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$iLatestProduct->product_name}}</h6>
                                                <span>${{$iLatestProduct->price}}</span>
                                            </div>
                                        </a> 
                                        @endforeach
                                       
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($latestProduct as $iLatestProduct )
                                        <a href="{{route('shop-details',["id"=>$iLatestProduct->id])}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ asset('storage/'.$iLatestProduct->image ) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$iLatestProduct->product_name}}</h6>
                                                <span>${{$iLatestProduct->price}}</span>
                                            </div>
                                        </a> 
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @php
                                $favorite = session()->get('favorite', []);
                                 @endphp
                                @foreach ($allProduct as $iallProduct )
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('storage/'.$iallProduct->image ) }}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li>
                                                    <a href="{{ route('add-favorite', ['p_id' => $iallProduct->id]) }}">
                                                        <i class="fa fa-heart" 
                                                           style="@if(array_key_exists($iallProduct->id, session()->get('favorite', []))) color: red; @endif">
                                                        </i>
                                                    </a>
                                                </li>                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li>
                                                    <form action="{{ route('add-to-cart', $iallProduct->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-dark">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            {{-- <span>Dried Fruit</span> --}}
                                            <h5><a href="{{route('shop-details',["id"=>$iallProduct->id])}}">{{$iallProduct->product_name}}</a></h5>
                                            <div class="product__item__price">${{$iallProduct->price}}<span>${{$iallProduct->market_price}}</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @foreach ($latestProduct as $ilatestProduct )
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/'.$ilatestProduct->image ) }}">
                                    <ul class="product__item__pic__hover">
                                        <li>
                                            <a href="{{ route('add-favorite', ['p_id' => $ilatestProduct->id]) }}">
                                                <i class="fa fa-heart" 
                                                   style="@if(array_key_exists($ilatestProduct->id, session()->get('favorite', []))) color: red; @endif">
                                                </i>
                                            </a>
                                        </li>                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li>
                                            <form action="{{ route('add-to-cart', $ilatestProduct->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-dark">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </form>
                                        </li>
        
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{route('shop-details',["id"=>$ilatestProduct->id])}}">{{$iLatestProduct->product_name}}</a></h6>
                                    <h5>${{$iLatestProduct->price}}</h5>
                                </div>
                            </div>
                        </div> 
                        @endforeach
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <!-- Previous Page Link -->
                            @if ($latestProduct->onFirstPage())
                                <a href="#" class="disabled"><i class="fa fa-long-arrow-left"></i></a>
                            @else
                                <a href="{{ $latestProduct->previousPageUrl() }}"><i class="fa fa-long-arrow-left"></i></a>
                            @endif

                            <!-- Pagination Numbers -->
                            @foreach ($latestProduct->getUrlRange(1, $latestProduct->lastPage()) as $page => $url)
                                <a href="{{ $url }}" class="{{ $page == $latestProduct->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($latestProduct->hasMorePages())
                                <a href="{{ $latestProduct->nextPageUrl() }}"><i class="fa fa-long-arrow-right"></i></a>
                            @else
                                <a href="#" class="disabled"><i class="fa fa-long-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->


<!-- jQuery and jQuery UI Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $(document).ready(function() {
        // Get minprice and maxprice values from the URL
        var urlParams = new URLSearchParams(window.location.search);
        var minPrice = urlParams.get('minprice') ? parseInt(urlParams.get('minprice'), 10) : 10;
        var maxPrice = urlParams.get('maxprice') ? parseInt(urlParams.get('maxprice'), 10) : 50000;

        // Initialize the price range slider
        $(".price-range").slider({
            range: true,  // This creates a range slider with two handles
            min: 10,      // Minimum price
            max: 50000,     // Maximum price
            values: [minPrice, maxPrice], // Set initial values from URL parameters
            slide: function(event, ui) {
                // Update the input fields when the slider is moved
                $("#minamount").val(ui.values[0]);
                $("#maxamount").val(ui.values[1]);
            },
            change: function(event, ui) {
                // Trigger the form submission when the range is changed
                $("#price-filter-form").submit();
            }
        });

        // Set initial values in the input fields
        $("#minamount").val(minPrice);
        $("#maxamount").val(maxPrice);

        // Trigger form submit when the input fields are manually changed
        $("#minamount, #maxamount").on("change", function() {
            var minVal = parseInt($("#minamount").val(), 10);
            var maxVal = parseInt($("#maxamount").val(), 10);
            
            // Check if the values are valid numbers
            if (!isNaN(minVal) && !isNaN(maxVal)) {
                $(".price-range").slider("values", [minVal, maxVal]);
                // Trigger form submission after input change
                $("#price-filter-form").submit();
            }
        });
    });
</script>
    @endsection 