@extends('layouts.frontend')

@section('title')
{{-- {{ $cate->name }} --}}
@endsection

@section('content')


<section class="hero"> 

    @include('layouts.partials.sidebar')
</section>
<!-- Hero Section End -->


        <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($trending_category as $cate)
                            <div class="col-lg-3">
                                {{-- <a href="{{ url('category/'.$cate->slug.'/'.$prod->slug ) }}"> --}}
                                <a href="{{ url('category/'.$cate->slug) }}">
                            <div class="categories__item set-bg " data-setbg="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="product image">
                            <h5>{{ $cate->name }}</a></h5>
                        </div>
                
                    </div> 
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
   {{--  <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="color: #dd1f58;">Cake Varieties</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".weddingCake">Wedding Cake</li>
                            <li data-filter=".birthdayCake">Birthday Cake</li>
                            <li data-filter=".deserts">Deserts</li>
                            <li data-filter=".chops">Small chops</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
               
                <div class="col-lg-3 col-md-4 col-sm-6 mix weddingCake birthdayCake">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/cake.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ url('addToWishlist') }}"><i class="fa fa-shopping-cart add-cart"></i></a></li>
                            </ul>
                        </div> 
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 12000.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix deserts chops">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/pinkcake.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ url('addToWishlist') }}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 13500.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix deserts birthdayCake">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/chocolate.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{url('addToWishlist') }}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 17000.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix chops weddingCake">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/cake-ideas-19.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 2000.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm6 mix birthdayCake deserts">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/pumpkin.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 12000.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix weddingCake chops">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/Meringue-Cake.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 45000.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm6 mix birthdayCake deserts">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/butter.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 4000.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix chops deserts">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/raspberry.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 30000.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}














<section class="featured spad  product_data">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="color: #dd1f58;">Cake Varieties</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".weddingCake">Wedding Cake</li>
                            <li data-filter=".birthdayCake">Birthday Cake</li>
                            <li data-filter=".deserts">Deserts</li>
                            <li data-filter=".queens">Queens</li>
                            <li data-filter=".chops">Small chops</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <input type="hidden" value="{{ $prod->id }}" class="prod_id">   {{url('category/'.$category->slug.'/'.$prod->slug )  }} --}}
            <div class="row featured__filter " style="margin-bottom: 100px">
                
                <div class="col-lg-3 col-md-4 col-sm-6 mix  queens">
                    @foreach ($queens as $prod)
                    <div class="featured__item ">
                        <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                        <input type="hidden" value="{{ $prod->category->slug }}" class="cate_slug">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="category/queens%20Cakes"><i class="fa fa-heart "></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="category/queens%20Cakes"><i class="fa fa-shopping-cart shopping"></i></a></li> 
                            </ul>
                        </div> 
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $prod->description }}</a></h6>
                            <h5>&#8358 {{ $prod->selling_price }}</h5>
                        </div>
                    </div>
                </div>
                 @endforeach
            
               
            
                <div class="col-lg-3 col-md-4 col-sm-6 mix birthdayCake ">
                    @foreach ( $birthday_cakes as $prod)
                     <div class="featured__item">
                        <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                        <input type="hidden" value="{{ $prod->category->slug }}" class="cate_slug">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="category/Birthday%20Cakes"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="category/Birthday%20Cakes"><i class="fa fa-shopping-cart"></i></a></li> 
                           </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $prod->description }}</a></h6>
                            <h5>&#8358  {{ $prod->selling_price }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mix weddingCake ">
                    @foreach ( $wedding_cakes as $prod)
                     <div class="featured__item">
                        <input type="hidden" value="{{ $prod->id }}" class="prod_slug">
                        <input type="hidden" value="{{ $prod->category->slug }}" class="cate_slug">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="category/Wedding%20Cakes"><i class="fa fa-heart "></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="category/Wedding%20Cakes"><i class="fa fa-shopping-cart"></i></a></li> 
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $prod->description }}</a></h6>
                            <h5>&#8358  {{ $prod->selling_price }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6 mix deserts ">
                    @foreach ( $celebration_cakes as $prod)
                     <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="category/Desert"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href=category/Desert><i class="fa fa-shopping-cart"></i></a></li> 
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $prod->description }}</a></h6>
                            <h5>&#8358  {{ $prod->selling_price }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


 



            <!-- Testimonial Start -->
            <div class="container-xxl py-6 "  style="margin-bottom: 100px">
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h5 class="text-red text-uppercase mb-2">Testimonial</h5>
                        <h1 class="display-6 mb-4 title">What Our Clients Say!</h1>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="owl-carousel testimonial-carousel">
                                <div class="testimonial-item text-center">
                                    <div class="position-relative mb-5">
                                        <img class="img-fluid rounded-circle mx-auto" src="assets/image/testimonial-1.jpg" alt="">
                                        <div class="testimonial-circle rounded-circle" >
                                            <i class="fa fa-quote-left fa-2x"></i>
                                        </div>
                                    </div>
                                    <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                                    <hr class="w-25 mx-auto">
                                    <h5>Client Name</h5>
                                    <span>Profession</span>
                                </div>
                                <div class="testimonial-item text-center">
                                    <div class="position-relative mb-5">
                                        <img class="img-fluid rounded-circle mx-auto" src="assets/image/testimonial-2.jpg" alt="">
                                        <div class="testimonial-circle  rounded-circle">
                                            <i class="fa fa-quote-left fa-2x"></i>
                                        </div>
                                    </div>
                                    <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                                    <hr class="w-25 mx-auto">
                                    <h5>Client Name</h5>
                                    <span>Profession</span>
                                </div>
                                <div class="testimonial-item text-center">
                                    <div class="position-relative mb-5">
                                        <img class="img-fluid rounded-circle mx-auto" src="assets/image/testimonial-3.jpg" alt="">
                                        <div class="testimonial-circle rounded-circle" >
                                            <i class="fa fa-quote-left fa-2x"></i>
                                        </div>
                                    </div>
                                    <p class="">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                                    <hr class="w-25 mx-auto">
                                    <h5>Chineye</h5>
                                    <span>Business woman</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->           

        


        <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Our Blog</div>
        <h2 class="title-section">Read Latest News</h2>
        <div class="divider mx-auto"></div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="assets/image/blog-1.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h4 class="post-title"><a href="#">Source of Content Inspiration</a></h4>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="assets/image/blog-6.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h4 class="post-title"><a href="#">Source of Content Inspiration</a></h4>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="assets/image/blog-1.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h4 class="post-title"><a href="#">Source of Content Inspiration</a></h4>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-12 mt-4 text-center wow fadeInUp">
          <a href="blog.html" class="btn btn-primary">View More</a>
        </div>
      </div>
    </div>
  </div>
     


    


            {{-- @include('frontend.products.index'); --}}

               {{-- <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix birthdayCake chops">
                    @foreach ( $birthday_cakes as $prod)
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/chocolate.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{url('addToWishlist') }}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 17000.00</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm6 mix birthdayCake deserts">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/pumpkin.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 12000.00</h5>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-3 col-md-4 col-sm-6 mix chops deserts">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('frontend/image/raspberry.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">delicious cakes</a></h6>
                            <h5>&#8358 30000.00</h5>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>









 {{-- @include('frontend.products.products');  --}}









    <!-- Featured Section End -->
   {{--  <div class="row featured__filter">
        @foreach ($wedding_cakes as $prod)
                <div class="col-lg-3 col-md-4 col-sm-6 mix product_data">
                    <input type="hidden" class="prod_id" value="{{ $prod->prod_id }}">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="{{ url('addToWishlist') }}"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                         \ 'category/'.$category->id.'/'.$prod->id
                                        <li><a href=" {{ url('category/{cate_slug}/{prod_slug}' ) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                         {{--<li><a href=" {{ url('category/'.$category->id.'/'.$prod->id ) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                         <li><a href=" {{ url('category/'.$category->name.'/'.$prod->name ) }}"><i class="fa fa-shopping-cart"></i></a></li> 
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
    </div> --}}
{{-- 
    <div class="row featured__filter "> 
        @foreach ($birthday_cakes as $prod)
                <div class="col-lg-3 col-md-4 col-sm-6 mix product_data">
                    <input type="hidden" class="prod_id" value="{{ $prod->prod_id }}">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="{{ url('addToWishlist') }}"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                           'category/'.$category->id.'/'.$prod->id     {{ route('productview',$prod->prod_slug,$prod->cate_slug)}}
                                        <li><a href=" {{ ('#') }} "><i class="fa fa-shopping-cart"></i></a></li>
                                         <li><a href=" {{ url('category/'.$category->id.'/'.$prod->id ) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                         <li><a href=" {{ url('category/'.$category->name.'/'.$prod->name ) }}"><i class="fa fa-shopping-cart"></i></a></li>                                    </ul>
                                </div>
                                <div class="featured__item__text">
                    
                                
                                    <h6><a href="#">{{ $prod->name }}</a></h6>
                                    <p>{{ $prod->description }}</p>
                                    <h5>&#8358 {{ $prod->selling_price }}</h5>
                                </div>
                            </div>
                </a>
                </div>
        @endforeach--}}

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('frontend/image/banner/banner-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('frontend/image/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    {{-- <div class="py-5"> 
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $category)
                    <div class="item col-md-6">
                       <div class="col-md-3 mt-3"> 
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/'.$category->image) }}"  alt="category image">
                            <div class="card-body">
                                <h5>{{ $category->name }}</h5>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    {{-- </div>
    </div> --}}
    
    <script>
        
    </script>
    @endsection



