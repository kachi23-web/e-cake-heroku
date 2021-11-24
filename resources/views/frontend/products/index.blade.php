{{-- @extends('layouts.frontend') --}}
@extends('layouts.css_Scripts')

@section('title')
    {{ $category->name }}
@endsection
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
@include('layouts.partials.navbarham')
</div>      

<header class="header">
    @include('layouts.partials.navbarheader')
</header>

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg shadow-sm"  data-setbg="{{ asset('frontend/image/cake.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Category/ {{ $category->name }}</h2>
                        <div class="breadcrumb__option">
                            <a href="./">Home</a>
                            <a href="{{ url('category') }}">Shop</a>
                            <span>'Category/ {{ $category->name }}'</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
   
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="color: #dd1f58;">{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products as $prod)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image">
                                            <ul class="featured__item__pic__hover">
                                                <li><a href="{{ url('cart') }}"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href=" {{ url('category/'.$category->slug.'/'.$prod->slug ) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                            
                                        
                                            <h6><a href="#">{{ $prod->name }}</a></h6>
                                            <p>{{ $prod->description }}</p>
                                            <h5>&#8358 {{ $prod->selling_price }}</h5>
                                        </div>
                                    </div>
                        </a>
                        </div>
                @endforeach

            </div>
        </div>
    </section>

    <footer class="footer spad">
        @include('layouts.partials.footer')
            </footer>