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
                        <h1 class="h1coy">Add Category</h1><br>
                        <form action="{{url('add_category')}}" method="POST">
                            @csrf
                            <input type="text" name="category" id="" class="input_color"
                                placeholder="Masukkan Kategori"><br><br>
                            <input type="submit" class="btn btn-primary" name="submit" value="AddCategory">
                        </form>
                    </div>
                    <table class="center">
                        <tr>
                            <th><b>Category Name</b></th>
                            <th><b>Action</b></th>
                        </tr>

                        @foreach($data as $item)

                        <tr>
                            <td>{{$item->category_name}}</td>
                            <td>
                                <a onclick="return confirm('Apakah Kamu Yakin Mau Hapus Ini?')" class="btn btn-danger"
                                    href="{{url('delete_category',$item->id)}}">
                                    Delete
                                </a>

                            </td>
                        </tr>
                        @endforeach
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