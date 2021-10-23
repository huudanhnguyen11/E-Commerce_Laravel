<section class="product-list">
    <div class="container">
        <div class="row">
            <p>
            <h2>MOUSE</h2>
            </p>
        </div>
        <div class="container">
            <div>
                @foreach($content6 as $item)
                <div class="col-md-3">
                    <div class="row">
                        <div class="p-item">
                            <a href="{{route('home.productdetail',['id'=>$item['productid']])}}" class="p-img" title="{{$item->productname}}">
                                <img src="{{ substr($item->productimage, 2) }}" alt="{{$item->productname}}" style="opacity: 1;">
                            </a>
                            <span class="p-brand">
                                <img class="lazy owl-lazy" src="{{ substr($item->brandimg, 2) }}" alt="{{$item->brandname}}">
                            </span>
                            <span class="p-type">
                                <i class="p-lable new">Hàng mới</i>
                                <i class="p-lable saleoff">Khuyến mãi</i>
                            </span>
                            <span>
                                <h4 class="p-name">
                                    <a href="{{route('home.productdetail',['id'=>$item['productid']])}}" title="{{$item->productname}}">
                                        {{$item->productname}}
                                    </a>
                                </h4>
                            </span>
                            <span class="p-unprice"></span>
                            <span class="p-price">{{number_format($item->price) . 'đ'}}</span>
                            <a href="{{route('home.cart.addcart',['id'=>$item['productid']])}}" class="addCart">Đặt hàng</a>
                            <span class="p-promotion">
                                6 Khuyến mãi: Túi xách đựng laptop, Chuột không dây, Tấm lót chuột.
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>