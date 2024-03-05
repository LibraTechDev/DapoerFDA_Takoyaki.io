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
                    <h1 class="h1coy">List Produk</h1>
                    <table class="center table-responsive-sm table-responsive-md">
                        <tr>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Nomor Telpon</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        @foreach($user as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->role}}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('update_user',$item->id)}}">
                                    Edit
                                </a>

                                <a onclick="confirmation(event)" class=" btn btn-danger"
                                    href="{{url('delete_user',$item->id)}}">
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
    <script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
                title: "Are you sure to delete this user?",
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
</body>

</html>