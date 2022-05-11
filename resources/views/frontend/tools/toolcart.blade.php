@extends('layouts.frontend')

@section('title',$products->name)


@section('content')


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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table class="product_data">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">

                        @if($item->$products->qty >= $item->prod_qty)
                            <label class="badge bg-success">In stock<label>
                        @else
                            <label class="badge bg-danger">Out of stock<label>
                        @endif

                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @php $subtotal =0; @endphp

                            @foreach ($cartitems as $item)
                            <tr >
                    
                                <td class="shoping__cart__item">
                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="">
                                    <h5>{{ $item->products->name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                        {{$item->products->selling_price}}
                                </td>
                                <td class="shoping__cart__quantity">
{{--                                     <input type="hidden" class="prod_id" >
 --}}                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                    <div class="quantity"> 
                                        <div class="pro-qty">
                                            <span class=" changeQuantity dec  qtybtn">-</span>
                                            <input type="text" name="quantity" value="{{ $item->prod_qty }}" class="qty-input">
                                            <span class=" changeQuantity inc  qtybtn">+</span>

                                    
                                        </div>
                                    </div>
                                </td>
                                        
                                    
                                <td class="shoping__cart__total">
                                    @php $subtotal = $item->products->selling_price *  $item->prod_qty; @endphp

                                    {{ $subtotal }}
                                </td>
                                
                                <td class="shoping__cart__item__close">
                                   <button class="delete-cart-item"> <span class="icon_close "></span></button>
                                </td>
                                
                            </tr>

                            @php $total += $item->products->selling_price *  $item->prod_qty + 500; @endphp
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ url('category') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
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
                        <li>Subtotal <span>$454.98</span></li>
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




