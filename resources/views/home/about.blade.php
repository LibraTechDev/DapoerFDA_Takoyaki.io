<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('home/images/dapoerfda12.png')}}" type="">
    <title>Dapoer FDA</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
    <style>
    .flex {
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        flex-direction: row;
    }

    @media (max-width: 600px) {
        .poto {
            width: 30%;
            height: 30%;
        }
    }
    </style>
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- inner page section -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>About us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <!-- why section -->
    <section>
        <div class="container">
            <div class="flex">
                <img src="{{asset('home/images/dapoerfda12.png')}}" width="30%" alt="logofda"
                    style="margin: 30px 30px 30px 0; " class="poto">
                <p style="margin-top: 30px;">
                    Kami dengan bangga memperkenalkan diri sebagai destinasi kuliner yang menggabungkan kelezatan
                    makanan tradisional, keunikan Takoyaki, dan kenikmatan kebab dalam satu tempat. Sejak tahun 2021,
                    Dapoer FDA telah menjadi bagian tak terpisahkan dari perjalanan kuliner Anda, membawa rasa
                    autentik dan inovasi ke setiap hidangan yang kami sajikan.
                    <br><br>
                    Dibangun dengan cinta dan dedikasi terhadap seni memasak, Dapoer FDA menjadi kenyataan pada
                    tahun 2021 dengan satu tujuan sederhana: memberikan pengalaman kuliner yang tak terlupakan kepada
                    pelanggan kami. Kami memahami bahwa makanan bukan hanya tentang kenikmatan rasa, tetapi juga tentang
                    menciptakan kenangan yang langgeng.
                    <br><br>
                    Kami berkomitmen untuk memberikan kualitas terbaik dalam setiap hidangan. Bahan-bahan segar dan
                    pilihan terbaik menjadi fondasi dari setiap kreasi kami. Kebersihan dan keamanan makanan adalah
                    prioritas utama kami untuk memastikan pengalaman kuliner yang aman dan memuaskan bagi setiap
                    pelanggan.
                </p>
            </div>
        </div>
    </section>

    <!-- end why section -->
    <!-- arrival section -->

    <!-- end arrival section -->
    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            Reach at..
                        </h4>
                        <div class="contact_link_box">
                            <a href="https://maps.app.goo.gl/mBBnDEtFxAAWauC49">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +62 85740 125 693
                                </span>
                            </a>
                            <a href="mailto: dapoerfda@gmail.com">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    dapoerfda@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="/" class="footer-logo">
                            DapoerFda
                        </a>
                        <p>
                            Perpaduan Antara Kenikmatan Autentik Jepang dan Orisinalitas Makanan Khas Semarang
                        </p>
                        <div class="footer_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="https://instagram.com/dapoer_fda">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap">
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
    <!-- footer section -->
    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>