
@extends('website.layouts.app')

@section('content')
  

 
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('asset/img/breadcrumb.jpg')}}">
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
    <!-- Breadcrumb Section End -->
    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="{{route('blog')}}" method="GET">
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
                        <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">

                        @foreach ($blog as $iblog )
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <!-- Add inline CSS to fix the image size -->
                                        <img src="{{ asset('storage/'.$iblog->image ) }}" alt="" style="width: 100%; height: 200px; object-fit: cover;">
                                     </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> {{$iblog->published_at}}</li>
                                            <li><i class="fa fa-comment-o"></i> {{$iblog->comments_count}}</li>
                                        </ul>
                                        <h5><a href="{{route('blog-details',["id"=>$iblog->id])}}">{{$iblog->title}}t </p>
                                        <a href="{{route('blog-details',["id"=>$iblog->id])}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <!-- Custom Pagination -->
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <!-- Previous Page Link -->
                            @if ($blog->onFirstPage())
                                <a href="#" class="disabled"><i class="fa fa-long-arrow-left"></i></a>
                            @else
                                <a href="{{ $blog->previousPageUrl() }}"><i class="fa fa-long-arrow-left"></i></a>
                            @endif

                            <!-- Pagination Numbers -->
                            @foreach ($blog->getUrlRange(1, $blog->lastPage()) as $page => $url)
                                <a href="{{ $url }}" class="{{ $page == $blog->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($blog->hasMorePages())
                                <a href="{{ $blog->nextPageUrl() }}"><i class="fa fa-long-arrow-right"></i></a>
                            @else
                                <a href="#" class="disabled"><i class="fa fa-long-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    @endsection 