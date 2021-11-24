<!-- Header Section Begin -->
{{-- <header class="header"> --}}
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                    </div>
                </div>
                <div class="col-lg-6">
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
                            @if (Route::has('login'))
                                {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                                    @auth
                                        {{-- <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500">Home</a> --}}
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                        </a>
          
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            @else
                                     <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500"><i class="fa fa-user"></i> Login</a>
                            {{-- <a href="login.html"> --}}
                        </div> &nbsp
                        {{--<div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#">Log out</a> --}}
                        
                    

                        <div class="header__top__right__auth">
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"<i class="fa fa-user"></i> Register</a>
                            @endif
                            @endauth
                        </div>
                        @endif


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
                        <li><a href="/">Home</a></li>
                        <li class="active"><a href="{{ url('category') }}">Shop</a></li>
                       
                        <li><a href="./blog.html">About</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> <span>3</span></a></li>
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