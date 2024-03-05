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
        margin-bottom: 30px;
    }

    .label {
        margin-right: 20px;
    }

    .input_color {
        color: black;
    }

    label {
        display: inline-block;
        width: 200px;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('sweetalert::alert')
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="div_center">
                        <h1 class="h1coy">Add Product</h1>
                        <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class="label"> Nama Produk</label>
                            <input type="text" name="title" id="" class="input_color" placeholder="Masukkan Nama"
                                required><br><br>

                            <label class="label"> Deskripsi Produk</label>
                            <input type="text" name="description" id="" class="input_color"
                                placeholder="Masukkan Deskripsi" required><br><br>

                            <label class="label"> Harga Produk</label>
                            <input type="number" name="prize" id="" class="input_color" placeholder="Masukkan Harga"
                                required><br><br>

                            <label class="label"> Harga Diskon </label>
                            <input type="number" name="discount_prize" id="" class="input_color"
                                placeholder="Masukkan Diskon"><br><br>

                            <label class="label"> Kuantitas Produk</label>
                            <input type="number" name="quantity" id="" min="0" class="input_color"
                                placeholder="Masukkan Jumlah" size="100px" required><br><br>

                            <label class="label"> Kategori Produk</label>
                            <select name="category" id="" class="input_color" required>
                                <option value="" selected="">Tambahkan Kategori</option>
                                @foreach($category as $ctg)
                                <option value="{{$ctg->category_name}}">{{$ctg->category_name}}</option>
                                @endforeach
                            </select><br><br>

                            <label class="label">Foto Produk </label>
                            <input type="file" src="" alt="" name="image" required><br><br>

                            <input type="submit" class="btn btn-primary" value="Add Product">
                        </form>
                    </div>
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