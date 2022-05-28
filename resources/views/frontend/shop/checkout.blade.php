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
                                    <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" required placeholder="Enter First Name">
                                    <span id="fname_error" ></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" required placeholder="Enter last Name">
                                    <span id="lname_error"></span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" class="form-control" name="country" placeholder="country">
                        </div> --}}
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add address1" value="{{ Auth::user()->address1 }}" name="address1" required>
                            <span id="address_error"></span>
                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                        <div class="checkout__input ">
                            <p>Town/City<span>*</span></p>
                            <input type="text" value="{{ Auth::user()->city }}" class="city" name="city" >
                            <span id="city_error"></span>
                        </div>
                         <div class="checkout__input ">
                            <p>State<span>*</span></p>
                            <input type="text" value="{{ Auth::user()->state }}" class="state" name="state">
                            <span id="state_error"></span>
                        </div> 
                        <div class="checkout__input">
                            <p>Pincode<span>*</span></p>
                            <input type="text" class="pincode value="{{ Auth::user()->pincode }}" name="pincode">
                            <span id="pincode_error"></span>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone"required placeholder="Phone">
                                    <span id="phone_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" class="form-control email"  value="{{ Auth::user()->email }}" name="email" required placeholder="Email">
                                    <span id="email_error"></span>
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
                           
                            <div class="checkout__order__products"> 
                                 <span style="font-size: 14px">please select your preferred delivery method</span> 
                                <div class="">
                                    <input type="radio" id="pickUp"
                                     name="pickUp" value="pickUp" >
                                    <label for="pickup">Pick Up</label>
                              
                                    <input type="radio" id="delivery"
                                     name="delivery" value="delivery">
                                    <label for="delivery">Home delivery</label>
                            
                                  </div>

                            @if($cartItems->count() > 0)
                                <table class="table">
                                <th>Products</th> 
                                <th>Quantity</th> 
                                 <th>Total</th>
                            
                            @php $grandtotal = 0; @endphp
                            @php $subtotal = 0; @endphp
                            @foreach ($cartItems as $item)

                            <tr >
                                <td> {{ $item->products->name }} </td>
                                <td> {{ $item->prod_qty }} </td>
                                <td> {{$item->products->selling_price * $item->prod_qty }} </td>
                       
                           {{--  <ul>
                                <li>  
                                    <span> {{ $item->products->name }} </span> 
                                    <span> {{ $item->prod_qty }} </span>
                                    <span>  {{ $item->selling_price }}</span></li>
                                
                            </ul> --}}
                            @php $subtotal += $item->products->selling_price; @endphp
                            @php $grandtotal += $item->products->selling_price *  $item->prod_qty + 500; @endphp

                            @endforeach 
                            </tr> 
                        </table>
                    </div>
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
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" id="submit-btn" class="site-btn submit-btn">PLACE ORDER | pay on delivery </button>
                            <button type="button" id="" class="btn btn-success razorpay-btn">Pay with Razorpay </button>
                            <button type="submit" class="btn btn-info" style="margin-bottom: 10px;"><a href="https://ravesandbox.flutterwave.com/pay/z8zdgoswqelx"> Pay with flutterwave</a> </button>
                           
                            <div id="paypal-button-container"></div>

                            @else
                                <h4>No Products in cart</h4>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection 

 {{-- @section('scripts'); --}}
    


    {{-- <script src="{{ asset('frontend/js/jquery3.6.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <script src="https://checkout.flutterwave.com/v3.js"></script>




    <script>
        
         document.getElementById("submit-btn").addEventListener("click", function(e) {
            e.preventDefault();
            makePayment();
            
             
        error: function (e)
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
        
    </script> --}}
@section('scripts')

    <script src="https://www.paypal.com/sdk/js?client-id=AYs4gd9GBGJ4RBUloyLXF2vS0e4uYufxX7SGTu2CeAniHdnWZ8lLgRaRdaTIIzy3M22jkkj5_jzNxezZ" data-namespace="paypal_sdk"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
            paypal_sdk.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
            purchase_units: [{
                amount: {
                value: '{{ $grandtotal }}'
                }
            }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            //alert('Transaction completed by ' + details.payer.name.given_name);
                    
                var   firstname =$('.firstname').val();
                var   lastname  =$('.lastname ').val();
                var   address1  =$('.address1 ').val();
                var   city      =$('.city     ').val();
                var   state     =$('.state    ').val();
                var   pincode   =$('.pincode  ').val();
                var   phone     =$('.phone    ').val();
                 var   email     =$('.email    ').val();

            
            $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            'fname': firstname,
                            'lname': lastname,
                            'email': email,
                            'phone': phone,
                            'address1': address1,
                            'address2': address2,
                            'city': city,
                            'state': state,
                            'pincode': pincode,
                            'area': area,
                            'LGA': LGA,
                            'payment_mode': "Paid by Paypal",
                            'payment_id': details.id,
                            
                        },
                        
                        success: function (response) {
                            alert(response.status);
                            //swal(responseb.status);
                            windows.location.href="/my-order";
                            
                        }  
                    });
                    
            });
        }
        }).render('#paypal-button-container');
        //This function displays payment buttons on your web page.

    </script>
@endsection 


