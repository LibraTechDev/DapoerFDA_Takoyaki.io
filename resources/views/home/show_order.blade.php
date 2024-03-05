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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        padding: 20px;
        margin-left: 250px;
        margin-bottom: 100px;
        margin-top: 50px;

    }

    @media (max-width: 700px) {
        .center {
            margin-left: 100px;
            margin-bottom: 200px;
            margin-top: 50px;
        }
    }

    table,
    th,
    td {
        border: 2px solid black;
    }

    .th_style {
        background-color: yellow;
        padding: 20px;
        font-size: 20px;
    }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        @include('sweetalert::alert')

        <div class="center table-responsive-md table-responsive-sm table-responsive-lg">
            <table class="mx-auto">
                <tr>
                    <th class="th_style">Nama Produk</th>
                    <th class="th_style">Kuantitas</th>
                    <th class="th_style">Harga</th>
                    <th class="th_style">Status Pembayaran</th>
                    <th class="th_style">Status Pengiriman</th>
                    <th class="th_style">Alamat</th>
                    <th class="th_style">Tanggal Pemesanan</th>
                    <th class="th_style">Gambar</th>
                    <th class="th_style">Invoice</th>
                    <th class="th_style">Cancel</th>

                </tr>

                @foreach($order as $items)
                <tr>
                    <td>{{$items->product_title}}</td>
                    <td>{{$items->quantity}}</td>
                    <td>{{$items->prize}}</td>
                    <td>{{$items->payment_status}}</td>
                    <td>{{$items->delivery_status}}</td>
                    <td>{{$items->address}}</td>
                    <td>{{$items->created_at}}</td>
                    <td><img src="/product/{{$items->image}}" alt="gambarproduk"></td>
                    <td>
                        @if($items->payment_status=="Paid")
                        <a href="{{url('print_pdf', $items->id)}}" class="btn btn-outline-success">Invoice</a>
                        @else
                        <h6 style="color: blue;">Not Allowed</h6>
                        @endif
                    </td>

                    <td>
                        @if($items->delivery_status=="Processing")
                        <a class="btn btn-outline-danger" href="{{url('/cancel_order', $items->id)}}"
                            onclick="confirmation(event)">Cancel Order</a>
                        @else
                        <h6 style="color: blue;">Not Allowed</h6>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

    <div class="cpy_">
        <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://instagram.com/dapoer_fda">Dapoer FDA</a><br>

        </p>
    </div>
    <script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
                title: "Are you sure to cancel this product",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {



                    window.location.href = urlToRedirect;

                }


            });


    }
    </script>
    <!-- jQery -->
    <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('home/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('home/js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('home/js/custom.js')}}"></script>
</body>

</html>