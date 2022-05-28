@extends('layouts.frontend')

@section('title')
     Welcome to E-cake
@endsection

        
<!-- Page Preloder -->
@section('content')
<!-- Hero Section Begin -->
  <section class="hero"> 

    @include('layouts.partials.sidebar')
</section>
<!-- Hero Section End -->


  

    <section class="featured spad">
        @include('layouts.partials.featuredspad')
    </section>

<!-- Banner Begin -->

 
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End
    mysql://bee32c86a63b10:d375021a@us-cdbr-east-04.cleardb.com/heroku_2513b95f9cf5f95?reconnect=true -->


        @endsection