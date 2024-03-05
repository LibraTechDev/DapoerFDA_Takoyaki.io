<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 id="product">
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($product as $items)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_details', $items->id)}}" class="option1">
                                Product Detail
                            </a>
                            <form action="{{url('add_cart', $items->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" id="" value="1" min="1"
                                            style="width: 70px;">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Add To Cart">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="product/{{$items->image}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$items['title']}}
                        </h5>

                        @if($items['discount_prize'] != null)
                        <h6 style="color: red;">
                            Harga Diskon
                            <br>
                            Rp.{{$items['discount_prize']}}
                        </h6>

                        <h6 style="text-decoration: line-through;">
                            Rp.{{$items['prize']}}
                        </h6>
                        @else
                        <h6>
                            Rp.{{$items['prize']}}
                        </h6>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <!-- {{!!$product->appends(Request::all())->links()!!}} -->
            <span style="margin-top:30px;">
                {!!$product->withQueryString()->links('pagination::bootstrap-5 ')!!}
            </span>
        </div>
</section>