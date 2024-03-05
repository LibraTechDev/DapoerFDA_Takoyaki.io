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
    <link rel=" stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel=" stylesheet" />
</head>

<body>
    <div class="hero_area">

        @include('home.header')
        @include('sweetalert::alert')

        <center>
            <div class="col-sm-6 col-md-4 col-lg-4 container" style="margin: auto; width: 50%; padding: 30px;  ">
                <div class="card bg-warning" style="box-shadow: 9px 5px 10px 1px #efebeb, 5px 5px 10px 1px #000000;">
                    <div class="img-box" style="padding: 20px;">
                        <img src="/product/{{$product->image}}" alt="" style="width: 60%">
                    </div>
                    <div class="card-body">
                        <h5>
                            {{$product['title']}}
                        </h5>

                        @if($product['discount_prize'] != null)
                        <h6 style="color: red;">
                            Harga Diskon
                            <br>
                            Rp.{{$product['discount_prize']}}
                        </h6>

                        <h6 style="text-decoration: line-through;">
                            Rp.{{$product['prize']}}
                        </h6>
                        @else
                        <h6>
                            Rp.{{$product['prize']}}
                        </h6>
                        @endif
                        <h6>
                            Kategori Produk: {{$product['category']}}
                        </h6>
                        <h6>
                            Deskripsi Produk: {{$product['description']}}
                        </h6>
                        <h6>
                            Jumlah Produk Tersedia: {{$product['quantity']}} porsi
                        </h6>
                    </div>
                    <form action="{{url('add_cart', $product->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-lg-5">
                                <input type="number" name="quantity" id="" value="1" min="1" style="width: 50px;">
                            </div>
                            <div class="col-md-4 col-lg-5">
                                <input type="submit" value="Add To Cart">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </center>




        <div class="cpy_ sticky-bottom">
            <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://instagram.com/dapoer_fda">Dapoer
                    FDA</a><br>

            </p>
        </div>
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>