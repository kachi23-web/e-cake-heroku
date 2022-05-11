@extends('layouts.frontend')

@section('title',$products->name)


@section('content')

 
   {{-- <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections/ {{ $products->category->name }} / {{$products->name }}</h6>
        </div>
    </div>
    
    <div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        @if($products->trending == '1')
                        <label style="font-size:16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>

                    <hr>
                    <label for="" class="me-3">Original Price:<s>RS  {{ $products->original_price }}</s></label>
                    <label for="" class="fw-bold">Selling Price:<s>RS{{ $products->selling_price }}</s></label>
                    <p class="mt-3">
                        {{!! $products->small_description !!}}
                    </p>
                    <hr>
                    @if($products->qty > 0)
                     <label class="badge bg-success"> In stock</label>
                     @else
                     <label for="" class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                        <label for="Quantity">Quantity</label>    
                        <div class="input-group text-center mb-3">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" value="1" class="form-control qty-input" />
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>    
                    <div class="col-md-10">
                        <br/>
                        <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                        <button type="button" class="btn btn-primary me-3 float-start addTocartBtn">Add to cart <i class="fa fa-shopping-cart"></i></button>
                    </div>
                    </div>            
                    </div>
            </div>
        </div>
    </div>

</div> --}}

<!-- Hero Section Begin -->
<section class="hero"> 

    @include('layouts.partials.sidebar2')
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
@include('layouts.partials.breadCrum')
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad product_data ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 ">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="">
                    </div>
                  
                   
                    
                        <div class="row">
                            <div class="categories__slider owl-carousel">
                    {{-- <div class="product__details__pic__slider owl-carousel"> --}}
                        @foreach ($featured_products as $prod)
                        <div class="col-lg-3 ">
                         <div class="categories__item set-bg " data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="product image">
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text product_data">
                    <h3>{{ $products->name }}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">&#8358 {{ $products->selling_price}}</div>
                  
                        <p>{{ $products->description }}</p>
                        
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                           
                            <div class=" mt-2 ">
                            <div class="col-md-2">
                                <label for="Quantity"></label>
                                <div class="input-group-text-center mb-6 row pro-qty">
                                    <span class=" changeQuantity dec  qtybtn">-</span>
                                    <input type="text" name="quantity"value="1" class="form-control qty-input" />
                                    <span class=" changeQuantity inc  qtybtn">+</span>

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <div class="container">
                    <div class="col-md-12 col-md-3">

                        <form action="{{ url('addDetails') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                  

                    
                      </div>
                     </form>
                    </div>
                </div>
                                              
                            

                    <a href="#" class="primary-btn buyNow">BUY NOW<i class="fa fa-shopping-buy"></i></a>                        
                    <button type="submit" class="primary-btn addToCartBtn">ADD TO CARD<i class="fa fa-shopping-cart"></i></button>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

           


    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2 style="color: #dd1f58;">Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($featured_products as $prod)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{ $prod->name }}</a></h6>
                        <h5>{{ $prod->selling_price }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- Related Product Section End -->






@endsection
