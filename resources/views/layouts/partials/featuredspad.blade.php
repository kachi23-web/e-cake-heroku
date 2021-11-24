{{-- <section class="featured spad"> --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 style="color: #dd1f58;">Cake Shop</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($category as $cate)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                        
                                <div class="featured__item">
                                
                                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Category image">
                                       
                                       
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="{{ url('category/'.$cate->slug) }}"><i class="fa fa-phone"></i></a></li>
                                            <li><a href="£"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                        
                                    </div>
                                
                                    <div class="featured__item__text">
                        
                                    
                                        <h6><a href="#">{{ $cate->name }}</a></h6>
                                        <p>{{ $cate->description }}</p>
                                        <h5>&#8358 {{ $cate->selling_price }}</h5>
                                    </div>
                                </div>
                   
                    </div>
            @endforeach
            
            
        </div>
    </div>
{{-- </section> --}} 
<!-- Featured Section End -->
