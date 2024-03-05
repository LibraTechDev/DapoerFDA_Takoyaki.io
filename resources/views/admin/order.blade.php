<!DOCTYPE html>
<html lang="en">
<title>Admin FDA</title>

<head>
    @include('admin.css')
    <style>
    .div_center {
        text-align: center;
        padding-top: 50px;
    }

    .h1coy {
        font-size: 30px;
        text-align: center;
    }

    .input_color {
        color: black;
    }

    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 50px;
        border: 4px solid gray;
        background-color: white;
    }

    tr,
    td,
    th {
        color: black;
        border: 2px solid black;

    }

    th {
        background-color: gray;
    }
    </style>
</head>


<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if(session()-> has('message'))

                    <div class=" alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>

                    @elseif(session()-> has('pesan'))

                    <div class=" alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('pesan')}}
                    </div>
                    @endif
                    <h1 class="h1coy">List Pesanan</h1><br>
                    <table class="center table-responsive">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Nama Produk</th>
                            <th>Kuantitas</th>
                            <th>Harga</th>
                            <th>Waktu Pemesanan</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pengiriman</th>
                            <th>Gambar</th>
                            <th>Delivered</th>
                            <th>Print PDF</th>
                            <th>Kirim Email</th>
                        </tr>
                        @foreach($order as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->product_title}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->prize}}</td>
                            <td>{{$item->created_at }}</td>
                            <td>{{$item->payment_status}}</td>
                            <td>{{$item->delivery_status}}</td>
                            <td>
                                <img style="width: 200px; height: auto;" src="/product/{{$item->image}}"
                                    alt="gambar produk">
                            </td>
                            <!-- <td>
                                <a class="btn btn-success" href="{{url('update_product',$item->id)}}">
                                    Edit
                                </a>
                                <br><br>
                                <a onclick="return confirm('Apakah Kamu Yakin Mau Hapus Ini?')" class="btn btn-danger"
                                    href="{{url('delete_product',$item->id)}}">
                                    Delete
                                </a>
                            </td> -->
                            <td>
                                @if($item->delivery_status == "Processing")
                                <a href="{{url('delivered', $item->id)}}"
                                    onclick="return confirm('Apakah Kamu Yakin Produk Sudah Terkirim? ')"
                                    class="btn btn-outline-danger">
                                    Delivered
                                </a>
                                @else
                                <p>DONE</p>

                                @endif
                            </td>

                            <td>
                                <a href="{{url('print_pdf', $item->id)}}" class="btn btn-outline-success">Print PDF</a>
                            </td>
                            <td>
                                <a href="{{url('send_email', $item->id)}}" class="btn btn-outline-primary">Kirim
                                    Email</a>
                            </td>
                        </tr>
                        @endforeach
                        @if(count($order) == 0)
                        <tr>
                            <td colspan="14" style="text-align:center;">No Data Found :(</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
</body>

</html>