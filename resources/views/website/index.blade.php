
@extends('website.layouts.app')

@section('content')
  

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($AllCategory as $category )
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('storage/'.$category->image ) }}">
                            <h5><a href="#">{{$category->category_name}}</a></h5>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($AllCategory as $category )
                            <li data-filter=".oranges">{{$category->category_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">

                @foreach ($AllProduct as $Product )
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/'.$Product->image ) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{route('shop-details',["id"=>$Product->id])}}" >{{$Product->product_name}}</a></h6>
                            <h5>${{$Product->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                                @foreach ($LatestProduct as $iLatestProduct )
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

                                @foreach ($LatestProduct as $iLatestProduct )
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
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($TopProduct as $iTopProduct )
                                <a href="{{route('shop-details',["id"=>$iTopProduct->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('storage/'.$iTopProduct->image ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$iTopProduct->product_name}}</h6>
                                        <span>${{$iTopProduct->price}}</span>
                                    </div>
                                </a>  
                                @endforeach
                              
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($TopProduct as $iTopProduct )
                                <a href="{{route('shop-details',["id"=>$iTopProduct->id])}}"  class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('storage/'.$iTopProduct->image ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$iTopProduct->product_name}}</h6>
                                        <span>${{$iTopProduct->price}}</span>
                                    </div>
                                </a>  
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($ReviewProduct as $iReviewProduct )
                                <a href="{{route('shop-details',["id"=>$iReviewProduct->id])}}"  class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('storage/'.$iReviewProduct->image ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$iReviewProduct->product_name}}</h6>
                                        <span>${{$iReviewProduct->price}}</span>
                                    </div>
                                </a>  
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($ReviewProduct as $iReviewProduct )
                                <a href="{{route('shop-details',["id"=>$iReviewProduct->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('storage/'.$iReviewProduct->image ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$iReviewProduct->product_name}}</h6>
                                        <span>${{$iReviewProduct->price}}</span>
                                    </div>
                                </a>  
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('asset/img/blog/blog-1.jpg')}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{route('blog-details')}}">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    @endsection 