
@extends('layouts.frontend')

@section('title')
        Wishlist
@endsection

@section('content')


<!-- Hero Section Begin -->
<section class="hero"> 

    @include('layouts.partials.sidebar2')
</section>

 <section class="breadcrumb-section set-bg shadow" data-setbg="{{asset('frontend/image/cake.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Wishlist</h2>
                    <div class="breadcrumb__option">
                        <a href="./">Home</a>
                        <a href="{{ url('wishlist') }}"><span>Wishlist</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<div class="container my-5">
    <div class="card shadow">
    @if($wishlist)->count() > 0

        <section class="shoping-cart spad">
            <div class="container ">
                @php $total = 0; @endphp
                @php $subtotal =0; @endphp
        
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table class="product_data">
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
        
                                    @foreach ($wishlist as $item)
                                    <tr >
        
                                        <td class="shoping__cart__item">
                                            <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="">
                                            <h5>{{ $item->products->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                                {{$item->products->selling_price }}
                                        </td>
                                        <td class="shoping__cart__quantity product_data">
        {{--                                     
         --}}                               <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                                <div class="quantity"> 
                                                    <div class="pro-qty">
                                                    
                                                        <span class=" dec   qtybtn">-</span>
                                                        <input type="text" name="quantity qty-input" class="form-control qty-input" value="1" >
                                                        <span class=" inc  qtybtn">+</span>
                                                    </div>
                                                </div>
                                            @if ($item->products->qty >= $item->prod_qty)
                                            {{-- <h6>Available</h6> --}}

                                            @else
                                            <h6>Out of stock</h6>
                                            
                                            @endif
                                                {{-- <div class="quantity"> 
                                                    <div class="pro-qty">
                                                    
                                                        <span class=" changeQuantity dec decrement-btn  qtybtn">-</span>
                                                        <input type="text" name="quantity qty-input" class="form-control qty-input" value="{{ $item->prod_qty }}" >
                                                        <span class=" changeQuantity inc decrement-btn  qtybtn">+</span>
                                                    </div>
                                                </div>
             
                                           
                                        
                                                
                                          
          
                                        <td class="shoping__cart__total" value="{{ $item->$subtotal }}">
                                             @php $subtotal += $item->products->selling_price *  $item->prod_qty; @endphp 
        {{--                            
                                            {{ $subtotal }} --}}
                                        </td>
                                       
                                        <td class="shoping__cart__item__close">
                                           <button class="addToCartBtn addto"> <span class="icon_cart "></span>Add to Cart</button>
                                        </td>
                                        <td class="shoping__cart__item__close ">
                                            <button class="remove-wishlist-item"> <span class="icon_close "></span></button>
                                         </td>
                                        
                                    </tr>
                                   
                                    {{-- @php $total += $item->products->selling_price *  $item->prod_qty + 500; @endphp --}}
                                    @endforeach
                                   
                                  <div class="col-lg-6" style="height: 50px"></div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            <a href="{{ url('category') }}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                Update Cart</a>
                                </div>
                            </div>


                @else
                <h4>there are no products in your wishlist</h4>
                @endif 
            </div>
        </div>
        </section>
    </div>
</div>



<!-- Shoping Cart Section Begin -->
{{-- <section class="shoping-cart spad">
    <div class="container ">
        @php $total = 0; @endphp
        @php $subtotal =0; @endphp

        <div class="row">
           
            <div class="col-lg-12">
            <div class="shoping__cart__table">
                    
          
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>{{ $subtotal }}</span></li>
                            <li>Total <span>{{ $total }}<span></li>
                        </ul>
                        <a href="{{ url('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
</div>
</section> --}}
<!-- Shoping Cart Section End -->
@endsection




