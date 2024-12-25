<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>


    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',  // Default language of the page
                includedLanguages: 'en,es,fr,de,it,pt,zh,ja,ru,hi,ar',  // Languages you want to offer for translation
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,  // Simple layout for the dropdown
                autoDisplay: false  // Prevent auto-display
            }, 'google_translate_element');
        }
    </script>


    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<style>

    /* Customize the Google Translate widget appearance */
    #google_translate_element {
      
        top: 10px;
        right: 10px;
        z-index: 9999;
        background-color: #fff;
    
        border-radius: 8px;
    }

    .goog-te-banner-frame{
            display: none;
        }

</style>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('asset/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('asset/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('asset/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('asset/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('asset/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('asset/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}" type="text/css">
</head>

<body>


    
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    @php
    // Get the cart data from the session
    $cart = session()->get('cart', []);
    $favorite = session()->get('favorite', []);
    
    // Total number of unique products in the cart
    $totalQuantity = count($cart);
    $totalQuantityfav = count($favorite);
    
    // Total quantity of all products (if product is added multiple times)
    // $totalQuantity = array_sum(array_column($cart, 'quantity'));
     @endphp


    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{asset('asset/img/logo.png')}}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{route('get-favorite-product')}}"><i class="fa fa-heart"></i> <span>{{ $totalQuantityfav}}</span></a></li>
                <li><a href="{{route('shoping-card')}}"><i class="fa fa-shopping-bag"></i> <span>{{  $totalQuantity}}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>

        
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{asset('asset/img/language.png')}}" alt="">
                <div>English11</div>
                <span class="arrow_carrot-down"></span>
                <ul >

                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="{{route('user-login')}}"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{('shop-grid')}}">Shop</a></li>
               
                <li><a href="{{route('blog')}}">Blog</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{asset('asset/img/language.png')}}" alt="">
                              
                                <div id="google_translate_element"></div>

                            </div>
                            <div class="header__top__right__auth">
                                <a href="{{route('user-login')}}"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('home')}}"><img src="{{asset('asset/img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('shop-grid')}}">Shop</a></li>
                           
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{route('get-favorite-product')}}"><i class="fa fa-heart"></i> <span>{{$totalQuantityfav}}</span></a></li>
                            <li><a href="{{route('shoping-card')}}"><i class="fa fa-shopping-bag"></i> <span>{{  $totalQuantity}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


    
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories" style="position: relative;">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul style="  @if (Route::currentRouteName() != 'home') display: none;  @endif  padding-left: 20px; list-style: none; margin-top: 10px;">
                            @foreach ($AllCategory as $iAllCategory)
                                <li><a href="
                                    @if (Route::currentRouteName() == 'home')
                                    {{route('home',['category'=>$iAllCategory->id])}}
                                    @else
                                    {{route('shop-grid',['category'=>$iAllCategory->id])}}
                                    @endif
                                    ">{{$iAllCategory->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <!-- Inline JavaScript -->
               
                
                
                <div class="col-lg-9">
                    <div class="hero__search">

                       
                        <div class="hero__search__form">
                            <form 
                                @if (Route::currentRouteName() == 'home')
                                action="{{route('home')}}"
                                @else
                                action="{{route('shop-grid')}}"
                                @endif
                                method="GET">
                                
                                <select name="category" style="display: block; visibility: visible; position: relative;">
                                    <option value="">All Category</option>
                                    @foreach ($AllCategory as $iAllCategory)
                                        <option value="{{$iAllCategory->id}}">{{$iAllCategory->category_name}}</option>
                                    @endforeach
                                </select>
                                
                                <input type="text" name="search" placeholder="What do you need?" value="{{request('search')}}">
                                
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>

                    @if (Route::currentRouteName() == 'home')

                    <div class="hero__item set-bg" data-setbg="{{ asset('storage/'.$home1->banner_image) }}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="{{route('shop-grid')}}" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

