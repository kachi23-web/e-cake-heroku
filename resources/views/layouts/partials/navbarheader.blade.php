<!-- Header Section Begin -->
{{-- <header class="header"> --}}
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="header__top__left">
                    </div>
                </div>
                <div class="col-lg-8 ">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{ asset('frontend/img/language.png') }}" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>


                <div class="header__top__right__auth">


                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                
                                @if (Auth::user()->role_as == '0')
                                <a href="{{ url('user-profile') }}" class="dropdown-item">Profile</a>
                                
                              
                                @else
                                    <a href="{{ url('dashboard') }}" class="dropdown-item">Dashboard</a>
                                
                                
                                <a href="{{ url('my-orders') }}" class="dropdown-item">My Orders</a>  @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./"><img src="{{ ('frontend/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ Request::is('/')? 'active':'' }}"><a href="/">Home</a></li>
                        <li class="{{ Request::is('category')? 'active':'' }}"><a href="{{ url('category') }}">Shop</a></li>
                       
                        <li class="{{ Request::is('blog')? 'active':'' }}"><a href="./blog">Blog</a></li>
                        <li {{ Request::is('contact')? 'active':'' }}><a href="./contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{ url ('wishlist') }}"><i class="fa fa-heart "></i> <span class="wishlist-count">0</span></a></li>
                        <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> <span class="cart-count">0</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>

<!-- Header Section End -->