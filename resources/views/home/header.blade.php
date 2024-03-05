<header class="header_section sticky-sm-top sticky-md-top sticky-lg-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="/#">
                <img width="70" src="{{asset('home/images/dapoerfda12.png')}}" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- Menggunakan 'ml-auto' untuk meletakkan item di sisi kanan -->
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item active d-flex align-items-center">
                        <a class="nav-link" href="/redirect">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="nav-link dropdown-toggle" href="/redirect" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages<span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/about') }}">About</a></li>
                            <li><a href="/redirect#testi">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link" href="/redirect#product">Products</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link" href="/redirect#contact">Contact</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link" href="{{url('show_order')}}">Order</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link" href="{{url('show_cart')}}">
                            <img width="30" height="30" src="{{asset('home/images/cart.png')}}" alt="cart"
                                style="line-height: 50px; height: 30px;">
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <x-app-layout>
                        </x-app-layout>
                    </li>
                    @else
                    <li class="nav-item active d-flex align-items-center">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/about') }}">About</a>
                            </li>
                            <li><a href="/#testi">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link" href="/#product">Products</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link" href="/#contact">Contact</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a id="logincss" class="btn btn-outline-danger" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class=" nav-item d-flex align-items-center">
                        <a class="btn btn-outline-danger" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>