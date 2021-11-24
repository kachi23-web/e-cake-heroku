@extends('layouts.frontend')

@section('title')
     Welcome to E-cake
@endsection

        
<!-- Page Preloder -->
@section('content')
<!-- Hero Section Begin -->
  <section class="hero"> 
    {{-- <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Cakes Gallery</span>
                    </div>
                    <ul>
                        <li><a href="view-category/Wedding%20Cakes">Wedding Cakes</a></li>
                        <li><a href="view-category/Birthday%20Cakes">celebration Cakes</a></li>
                        {{-- <ul>
                            <li><a hrf="#">Birthday Cakes</a></li>
                            <li><a hrf="#">Anniversary Cakes</a></li>
                            <li><a hrf="#">Graduation Cakes</a></li>
    
                        </ul> 
                        
                        <li><a href="view-category/Queens%20Cakes">Queens Cakes</a></li>
                        <li><a href="view-category/Small%20Chops">Small Chops</a></li>
                        <li><a href="view-category/Desert">Desert </a></li>
                        <li><a href="view-category/parfait">parfait</a></li>
                        <li><a href="view-category/Drinks">Drinks</a></li>
                        <li><a href="view-category/Snack">Snack</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                           
                            <input type="text" placeholder="What do yo u need?">
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
                 <div class="container">
                        
                  <div class="hero__item set-bg" data-setbg="{{ asset('frontend/image/cake.jpg') }}">
                    <div class="row">
                    <h3><b><div class="col-md-8 centered"> LILIANS CAKE</div></b></h3>
                </div>
                
                    <div class="col-md-2 hero__text">  
                        <a href="#" class="primary-btn">ORDER NOW</a>
                    </div>
                </div>
                </div> 
             </div>
            </div>
        </div>
    </div> --}}
    @include('layouts.partials.sidebar')
</section>
<!-- Hero Section End -->


   {{--  <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="color: #dd1f58;">Cake Shop</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($category as $cate)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                            
                                    <div class="featured__item">
                                    
                                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Category image">
                                           
                                           
                                            <ul class="featured__item__pic__hover">
                                                <li><a href="{{ url('view-category/'.$cate->slug) }}"><i class="fa fa-phone"></i></a></li>
                                                <li><a href="£"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                            
                                        </div>
                                    
                                        <div class="featured__item__text">
                            
                                        
                                            <h6><a href="#">{{ $cate->name }}</a></h6>
                                            <p>{{ $cate->description }}</p>
                                            <h5>&#8358 {{ $cate->selling_price }}</h5>
                                        </div>
                                    </div>
                       
                        </div>
                @endforeach
                
                
            </div>
        </div>
    </section> --}}
    <!-- Featured Section End -->

    <section class="featured spad">
        @include('layouts.partials.featuredspad')
    </section>

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
    <!-- Banner End
    mysql://bee32c86a63b10:d375021a@us-cdbr-east-04.cleardb.com/heroku_2513b95f9cf5f95?reconnect=true -->


        @endsection