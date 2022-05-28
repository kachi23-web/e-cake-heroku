
@extends('layouts.frontend')

@section('title')
        My cart page
@endsection

@section('content')


<!-- Hero Section Begin -->
<section class="hero"> 

    @include('layouts.partials.sidebar2')
</section>

 <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/image/cake.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container ">
        @php $total = 0; @endphp
        @php $subtotal =0; @endphp

        <div class="row">
           
            <div class="col-lg-12">
                <div class="shoping__cart__table ">
                    <table class="product_data">
                        <thead>
                            <tr>
                                <th class="shoping__product cartitems">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if($cartitems->count() > 0)
                             @php $total = 0; @endphp
                            @php $subtotal =0; @endphp 

                            @foreach ($cartitems as $item)
                            <tr >
                                @php $subtotal += $item->products->selling_price *  $item->prod_qty; @endphp

                                <td class="shoping__cart__item">
                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="">
                                    <h5>{{ $item->products->name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                        {{$item->products->selling_price * $item->prod_qty}}
                                </td>
                                <td class="shoping__cart__quantity product_data">
{{--                                     <input type="hidden" class="prod_id" >
 --}}                             <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                        @if($item ->products->qty > $item->prod_qty)
                                        <div class="quantity"> 
                                        <div class="pro-qty">
                                        
                                            <span class=" changeQuantity dec decrement-btn  qtybtn">-</span>
                                            <input type="text" name="quantity qty-input" class="form-control qty-input" value="{{ $item->prod_qty }}" >
                                            <span class=" changeQuantity inc decrement-btn  qtybtn">+</span>
                                        </div>
                                    </div>

                                   
                                </td>
                                        
                                    
                                <td class="shoping__cart__total" value="{{ $item->$subtotal }}">
                                     @php $subtotal += $item->products->selling_price *  $item->prod_qty; @endphp 
                                    @else
                                     <h6>Out of Stock</h6>
                                     @endif
                                    
                                     {{--                               
                                   
    
    {{ $subtotal }} --}}
                                </td>
                                
                                <td class="shoping__cart__item__close">
                                   <button class="delete-cart-item"> <span class="icon_close "></span></button>
                                </td>
                                
                            </tr>

                            @php $total += $item->products->selling_price *  $item->prod_qty + 500; @endphp
                            @endforeach
                           
                       
                            
                        @else
                                <h4> Your <i class="fa fa-shopping-cart"></i> Cart is empty </h4>
                                <a href="{{ url('category ') }}" class="btn btn-danger float-end">Continue Shopping </a>
                            
                        @endif
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
            {{-- <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div> --}}
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
</section>
<!-- Shoping Cart Section End -->
@endsection




