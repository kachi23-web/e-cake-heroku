@extends('layouts.css_Scripts')

@endsection

<div class="row featured__filter">
    @foreach ($products as $prod)
            <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ url('cart') }}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href=" {{ url('category/'.$category->slug.'/'.$prod->slug ) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                
                            
                                <h6><a href="#">{{ $prod->name }}</a></h6>
                                <p>{{ $prod->description }}</p>
                                <h5>&#8358 {{ $prod->selling_price }}</h5>
                            </div>
                        </div>
            </div>
     @endforeach       
</div>
