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
<section class="product-details spad ">
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
                    {{-- <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                        vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                        quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p> --}}
                        <p>{{ $products->description }}</p>
                        
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <div class="pro-qty">
                                <input type="text" class="qty-input" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                    <div class="col-md-12 col-md-3">

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" style="color: rgb(5, 5, 5)">Flavour</label>
                        </div>
                        <div class="col-md-6 mb-3">
                        <input type="checkbox" name="flav">
                        <input type="checkbox" name="flav">
                        <input type="checkbox" name="flav">
                    </div>    
                        <div class="col-md-6 mb-3">
                            <label for="" style="color: rgb(5, 5, 5)">Color</label>
                            <input type="checkbox" class=" " name="color">
                        </div> 

                        <select class="form-select" name="tier_id">
                            <option value="">Select the tiers</option>
                            </select>

                            <select class="form-select" name="size_id">
                            <option value="">Select size</option>
                            </select>

                            <div class="col-md-12 mb-3">
                            <label for="">Cake message</label>
                        <textarea  row="3" name="cake_message" placeholder= "type your cake message here" class="form-control"></textarea>
                            </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Order Details</label>
                            <textarea row="3 " name="order_details" placeholder= "describe exactly what you want here" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
                           {{--  <div class="row">
                            <select class="form-select" name="flav_id">
                            <option value="">Select the flavour</option>
                            @foreach($tiers as $item)
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>

                            <select class="form-select" name="flav_id">
                                <option value="">Select the flavour</option>
                                @foreach($flav as $item)
                                     <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <select class="form-select" name="size_id">
                                <option value="">Select the size</option>
                                @foreach($size as $item)
                                     <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                                </select>

                        </div> --}}                        
                            

                        
                    <a href="#" class="primary-btn addToCartBtn">ADD TO CARD<i class="fa fa-shopping-cart"></i></a>
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
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                    suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                    vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                    accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                    pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                    elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                    et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                    vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                    porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet dui. Proin eget tortor risus.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                            </div>
                        </div>
                    </div>
                </div>
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
            {{-- <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="image/chocolatecake.jpg">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="image/cupcakes.jpg">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="image/pinkcake.jpg">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Related Product Section End -->






@endsection
