<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center;">Invoice Pembelian</h1>
    Order Date : <h3>{{$order->created_at}}</h3>
    <hr>
    <hr>
    Customer Name : <h3>{{$order->name}}</h3>
    Customer Email : <h3>{{$order->email}}</h3>
    Customer Phone : <h3>{{$order->phone}}</h3>
    Customer Address :<h3>{{$order->address}}</h3>
    Customer id : <h3>{{$order->user_id}}</h3>
    Product name : <h3>{{$order->product_title}}</h3>
    Quantity : <h3> {{$order->quantity}}</h3>
    Price : <h3>Rp.{{$order->prize}}</h3>
    Payment status : <h3>{{$order->payment_status}}</h3>
    Product id :<h3>{{$order->product_id}}</h3>
    <img height="250" width="450" src="product/{{$order->image}}" alt="">

</body>

</html>