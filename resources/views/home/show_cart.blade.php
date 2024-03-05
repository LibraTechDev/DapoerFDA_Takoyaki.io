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
        width: 60%;
        text-align: center;
        padding: 30px;


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
        text-align: center;
    }

    .td_style {
        padding: 20px;
        font-size: 20px;
        text-align: center;
    }

    .flex {
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        flex-direction: row;
    }

    @media (max-width: 600px) {
        .flex {
            flex-direction: column;
        }
    }
    </style>
</head>

<body>

    @include('home.header')
    @include('sweetalert::alert')

    <h6 style="text-align: center; font-weight: bold;">Tuliskan Alamat Pengiriman, Jika Sama Cukup Tuliskan Satu Kali
        Saja</h6>
    <div class="center table-responsive-md table-responsive-sm table-responsive-lg">
        <center>
            <table>
                <tr>
                    <th class="th_style">Nama Produk</th>
                    <th class="th_style">Kuantitas Produk</th>
                    <th class="th_style" style="max-width: 150px;">Gambar</th>
                    <th class="th_style">Alamat</th>
                    <th class="th_style">Action</th>

                </tr>

                <?php $totalprize=0;   ?>
                @foreach($cart as $cart)
                <?php
                $addresses = [];
                $existingKey = array_search($cart->address, array_column($addresses, 'address'));

                
                if ($existingKey !== false) {
                $addresses[$existingKey]['products'][] = $cart->product_title;
                } else {
                
                $addresses[] = [
                'address' => $cart->address,
                ];
                }
                ?>
                <tr>
                    <td class="td_style">{{$cart->product_title}}</td>
                    <td class="td_style">{{$cart->quantity}}</td>
                    <td><img src="/product/{{$cart->image}}" style="max-width: 300px;" alt=""></td>
                    @foreach($addresses as $address)
                    <td class="td_style">
                        {{ $address['address'] }}
                    </td>
                    @endforeach
                    <td class="td_style">
                        <a href="{{url('remove_cart', $cart->id)}}" class="btn btn-danger"
                            onclick="confirmation(event)">
                            Hapus
                        </a>
                    </td>

                </tr>

                <?php $totalprize=$totalprize + $cart->prize;  ?>

                @endforeach

            </table>
        </center>

    </div>
    <center>
        <div class="flex">
            @if(empty($cart->id))
            <p>Cart Not Found</p>
            @else
            <form action="{{url('add_alamat', $cart->id)}}" method="POST">
                @csrf
                <h1 style="font-size: 30px;  margin-top: 30px;"><b>Masukkan Alamat</b></h1><br>
                <input type="text" name="address" id="" placeholder="Masukkan Alamat" style="width: 300px; "><br>
                <button class="btn btn-outline-primary">Submit</button>
            </form>

            <form action="{{url('add_voucher', $cart->id)}}" method="POST" style="margin-bottom: 20px;">
                @csrf
                <h1 style="font-size: 30px; margin-top: 30px;"><b>Masukkan Kode Voucher</b></h1><br>
                <input type="text" name="voucher" id="" placeholder="Masukkan Kode" style="width: 300px; "><br>
                <button class="btn btn-outline-primary">Submit</button>
            </form>

            @endif
        </div>

        <div>
            <h1 style=" font-size: 30px; padding: 40px"> Harga Total : Rp.{{$totalprize}}</h1>
        </div>

        <div>
            <h1 style="font-size: 25px; padding-bottom: 15px; ">Lanjutkan Pemesanan</h1>
            <a href="{{url('cash_order')}}" class="btn btn-outline-danger">Cash On Delivery</a>
            <a href="{{url('stripe', $totalprize)}}" class="btn btn-outline-danger">Menggunakan Kartu</a>
            <a href="https://wa.me/+6285740125693" class="btn btn-outline-danger">Metode Lain</a>
            <br><br>
        </div>
    </center>
    <div class="cpy_">
        <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://instagram.com/dapoer_fda">Dapoer
                FDA</a><br>

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