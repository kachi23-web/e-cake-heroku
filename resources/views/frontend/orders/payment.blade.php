<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flutterwave payment for laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</head>

<body>


    <h1>Flutterwave payment integration</h1>
    <div class="container">
        <div class="header mt-2 px-5 text-center bg-primary py-5 text-white">

            <h1>Pay for services</h1>
            <div class="main">
                <form id="makePaymentForm">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter full name ">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="name">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email ">
                        </div>
                    </div>


                    <div class="col-6">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" placeholder="Enter amount" id="amount" class="form-control">
                    </div>

                    <div class="col-6">
                        <label for="phone">Phone Number</label>
                        <input type="number" name="phone" placeholder="Enter Phone Number" id="phone"
                            class="form-control">
                    </div>

                    <div class="form-group mt-2">
                        {{-- <button type="submit" class="btn btn-primary">Pay Now</button> --}}
                        <button type="submit" id="submit-btn" class="btn btn-danger">Pay Now</button>
                    </div>
            </div>
            </form>

        </div>
    </div>
    </div>

    {{-- scripts --}}
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <script src="https://checkout.flutterwave.com/v3.js"></script>




    <script>
        // $(function () {
        //   $("makePaymentForm").submit(function (e) { 
        //     e.preventDefault();
        //     var name = $("#name").val();
        //     var email = $("#email").val();
        //     var phone = $("#phone").val();
        //     var amount  = $("#amount").val();
        //     //console.log('well');

        //     makePayment(name,email,phone,amount);
        //   });
        // });

        // function makePayment() {
        //   FlutterwaveCheckout({
        //     public_key:"FLWPUBK_TEST-3d322cefd02662ffe45d3b181b781950-X",
        //     tx_ref: "RX1_{{ substr(rand(0, time()), 0, 7) }}",
        //     amount,
        //     currency: "USD",
        //     country: "US",
        //     payment_options: " ",
        //     redirect_url: // specified redirect URL
        // "https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
        //   meta:{
        //     consumer_id: 23,
        //     consumer_mac: "92a3-912ba-1192a",
        //   },
        //   customer: {
        //     email,
        //     phone_number,
        //     name: "Flutterwave Developers",
        //   },
        //   callback: function (data) {
        //     console.log(data);
        //   },
        //   onclose: function() {
        //     // close modal
        //   },
        //   customizations: {
        //     title: "My store",
        //     description: "Payment for items in cart",
        //     logo: "https://assets.piedpiper.com/logo.png",
        //   },
        // });

        document.getElementById("submit-btn").addEventListener("click", function(event) {
            event.preventDefault()
            makePayment()
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

</body>

</html>
