
@extends('website.layouts.app')

@section('content')
  
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('storage/'.$blogDetailsB->banner_image) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Blog</h2>
                    {!! breadcrumbs() !!}
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Blog Details Hero Begin -->
    {{-- <section class="blog-details-hero set-bg" data-setbg="img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>The Moment You Need To Remove Garlic From The Menu</h2>
                        <ul>
                            <li>By Michael Scofield</li>
                            <li>January 14, 2019</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action=" {{route('blog')}}" method="GET">
                                <input type="text" name="search" value="{{request('search')}}">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="{{route('blog')}}">All</a></li>
                                @foreach ($blogCategory as $iblogCategory )
                                <li><a href="{{route('blog',['category'=>$iblogCategory->id])}}">{{$iblogCategory->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach ($blog as $iblog )
                                  <a href="{{route('blog-details',["id"=>$iblog->id])}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic" style="width: 50%; height: 70px; overflow: hidden;">
                                        <img src="{{ asset('storage/'.$iblog->image ) }}" alt="" style="width: 50%; height: 70%; object-fit: cover;">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$iblog->title}}</h6>
                                        <span>{{$iblog->published_at}}</span>
                                    </div>
                                   </a>
                                @endforeach
                              
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{ asset('storage/'.$blogDetails->image ) }}" alt="">
                       {!! $blogDetails->content !!}
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{ asset('storage/'.$blogDetails->author_image ) }}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>{{$blogDetails->author}}</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span>{{$blogDetails->categories}}</li>
                                        <li><span>Tags:</span> {{$blogDetails->tags}}</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Post You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              

                @foreach ($blog as $iblog )
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <!-- Add inline CSS to fix the image size -->
                            <img src="{{ asset('storage/'.$iblog->image ) }}" alt="" style="width: 50%; height: 200px; object-fit: cover;">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$iblog->published_at}}</li>
                                <li><i class="fa fa-comment-o"></i> {{$iblog->comments_count}}</li>
                            </ul>
                            <h5><a href="{{route('blog-details',["id"=>$iblog->id])}}">{{$iblog->title}}</p>
                            <a href="{{route('blog-details',["id"=>$iblog->id])}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                        </div>
                    </div>
                   </div>
                  @endforeach
              
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('asset/img/blog/blog-3.jpg')}}" alt="">
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
    <!-- Related Blog Section End -->
    @endsection 