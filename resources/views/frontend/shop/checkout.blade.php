@extends('layouts.frontend')

@section('title')
        checkout
@endsection

@section('content')


<!-- Hero Section Begin -->
<section class="hero"> 

    @include('layouts.partials.sidebar2')
</section>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form id="makePaymentForm" action="{{ url('place-order') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>First Name<span>*</span></p>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter last Name">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" class="form-control" name="country" placeholder="country">
                        </div> --}}
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" value="{{ Auth::user()->address1 }}" name="address1">
                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" value="{{ Auth::user()->city }}" name="city">
                        </div>
                         <div class="checkout__input">
                            <p>State<span>*</span></p>
                            <input type="text" value="{{ Auth::user()->state }}" name="state">
                        </div> 
                        {{-- <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text">
                        </div> --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" class="form-control"  value="{{ Auth::user()->email }}" name="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc" class="form-control" name="create-account">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Deliver to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>                                
                           
                            <div class="checkout__order__products">Products &nbsp;&nbsp;
                                <thead>Quantity</thead> &nbsp;&nbsp;
                                 <span>Total</span>
                            </div>
                            @php $grandtotal = 0; @endphp
                            @php $subtotal = 0; @endphp
                            @foreach ($cartItems as $item)

                            <ul>
                                <li>  {{ $item->products->name }} 
                                        <span> {{ $item->products->prod_qty }} </span>
                                    <span>  {{ $item->products->selling_price }}</span></li>
                                
                            </ul>
                            @php $subtotal += $item->products->selling_price; @endphp
                            @php $grandtotal += $item->products->selling_price *  $item->prod_qty + 500; @endphp

                            @endforeach
                            <div class="checkout__order__subtotal">Subtotal <span>{{ $subtotal }}</span></div>
                            
                            <div class="checkout__order__total">Total <span>{{  $grandtotal }}</span></div>
                            

                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit"id="submit-btn" class="site-btn">PLACE ORDER </button>
{{--                             <button type="submit" class="site-btn"><a href="https://ravesandbox.flutterwave.com/pay/z8zdgoswqelx"> PLACE ORDER</a> </button>
 --}}                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection 

<script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <script src="https://checkout.flutterwave.com/v3.js"></script>




    <script>
        

        document.getElementById("submit-btn").addEventListener("click", function(event) {
            event.preventDefault()
            makePayment()
            error: function(e)
    {
       console.log(e);
    }
   
        });

        function makePayment() {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-3d322cefd02662ffe45d3b181b781950-X",
                tx_ref: "RX1",
                amount: 10,
                currency: "USD",
                country: "US",
                payment_options: " ",
                redirect_url: // specified redirect URL
                    "https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
                meta: {
                    consumer_id: 23,
                    consumer_mac: "92a3-912ba-1192a",
                },
                customer: {
                    email: "cornelius@gmail.com",
                    phone_number: "08102909304",
                    name: "Flutterwave Developers",
                },
                callback: function(data) {
                    console.log(data);
                },
                onclose: function() {
                    // close modal
                },
                customizations: {
                    title: "My store",
                    description: "Payment for items in cart",
                    logo: "https://assets.piedpiper.com/logo.png",
                },
            });
        }
        // }
    </script>
