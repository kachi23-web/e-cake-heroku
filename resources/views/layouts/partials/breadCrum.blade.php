<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/image/cake.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Product Details</h2>
                    <div class="breadcrumb__option">
                        <a href="./">Home</a>
                        {{-- <a href="{{ url('category/'.$products->category->slug) }}"></a> --}}
                        <a href="{{ url('category') }}">shop</a>
                        <span>{{ $products->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>