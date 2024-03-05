<!DOCTYPE html>
<html lang="en">
<title>Admin FDA</title>

<head>
    <base href="/public">
    @include('admin.css')
    <style>
    label {
        display: inline-block;
        width: 200px;
        font-size: 20px;
        font-weight: bold;
    }

    .input_color {
        color: black;
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
                    @endif
                    <h1 style="text-align: center; font-size: 25px;">Send Email to {{$order->email}}</h1>
                    <form action="{{url('send_user_email', $order->id)}}" method="POST">
                        @csrf
                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="">Email Greeting : </label>
                            <input type="text" name="greeting" class="input_color" id="">
                        </div>
                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="">Email Firstline : </label>
                            <input type="text" name="firstline" class="input_color" id="">
                        </div>
                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="">Email Body : </label>
                            <input type="text" name="body" class="input_color" id="">
                        </div>
                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="">Email Button Name : </label>
                            <input type="text" name="button" class="input_color" id="">
                        </div>
                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="">Email Url : </label>
                            <input type="text" name="url" class="input_color" id="">
                        </div>
                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="">Email Lastline : </label>
                            <input type="text" name="lastline" class="input_color" id="">
                        </div>
                        <div style="padding-left: 35%; padding-top: 30px;">
                            <input type="submit" name="submit" value="Send Email" class="btn btn-primary" id="">
                        </div>


                    </form>

                </div>

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include(' admin.js')
</body>

</html>