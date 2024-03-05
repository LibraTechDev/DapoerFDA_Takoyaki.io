<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="full">
                    <div class="logo_footer" id="contact">
                        <a href="#"><img width="100" src="{{asset('home/images/dapoerfda12.png')}}" alt="#" /></a>
                    </div>
                    <div class="information_f">
                        <p><strong>ADDRESS :</strong> Jl. Satria Barat 1 No h342, Semarang, Indonesia</p>
                        <p><strong>TELEPHONE :</strong> +62 85740 125 693</p>
                        <p><strong>EMAIL :</strong> dapoerfda@gmail.com</p>
                        <p><strong>INSTAGRAM :</strong>@dapoer_fda</p>
                        <p><strong>GOFOOD : </strong>dapoertakoyaki_fda</p>
                        <p><strong>SHOPEEFOOD : </strong>dapoertakoyaki_fda</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Menu</h3>
                                    <ul>
                                        <li><a style="color:white;" href="#">Home</a></li>
                                        <li><a style="color:white;" href="/about">About</a></li>
                                        <li><a style="color:white;" href="#testi">Testimonial</a></li>
                                        <li><a style="color:white;" href="#product">Produk</a></li>
                                        <li><a style="color:white;" href="/contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Account</h3>
                                    <ul>
                                        @if (Auth::id())
                                        <li><a style="color:white;" href="/user/profile">Account</a></li>
                                        <li><a style="color:white;" href="/show_cart">Checkout</a></li>
                                        @else
                                        <li><a style="color:white;" href="/register">Account</a></li>
                                        <li><a style="color:white;" href="/register">Checkout</a></li>
                                        @endif
                                        <li><a style="color:white;" href="/login">Login</a></li>
                                        <li><a style="color:white;" href="/register">Register</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="widget_menu">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3368058688293!2d110.40726037462849!3d-6.969534168241967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f57b06c42953%3A0x99d851f10faca621!2sDapoer%20Takoyaki%20FDA!5e0!3m2!1sid!2sid!4v1699946743899!5m2!1sid!2sid"
                                width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>