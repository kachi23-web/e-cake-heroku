<!-- Humberger Begin -->
{{-- <div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper"> --}}
    <div class="humberger__menu__logo">
        <a href="#"><img src="image/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{ asset('frontend/img/language.png')}}" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            @if (Route::has('login'))
           
                @auth
                    <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500">Home</a>
                 @else
                 <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500"><i class="fa fa-user"></i> Login</a>
          
        </div>

        <div class="header__top__right__auth">
            @if (Route::has('register'))
            <a href="{{ route('register') }}"<i class="fa fa-user"></i> Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./">Home</a></li>
            <li><a href="{{ url('category') }}">Shop</a></li>
           
             <li><a href="./contact.html">About</a></li>
            
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    

<!-- Humberger End -->


