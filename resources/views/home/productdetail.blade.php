@extends('layout.primary')
@section('content')
<section class="product-list" style="background-color: white;">
    <div class="container">
        <div class="row">
            <h1 style="font-size: 24px; margin: 20px 0 10px;">{{$product->productname}}</h1>
        </div>
        <div class="row">
            <div class="col-md-10">
                <center><img style="width: 30%;" src="{{ substr($product->productimage, 2) }}" alt="{{$product->productname}}"></center>
                <p style="font-size: 20px;">{{$product->description}}</p>
                <span style="font-size: 20px; font-weight: bold;" class="lable">Giá bán:
                    <span class="p-price">{{number_format($product->price) . ' đ'}}</span></span><br>
                <a style="line-height: 60px; background-color: red; font-size: 18px; color: white; text-align: center; border-radius: 3px; margin-bottom: 10px;" href="">MUA NGAY</a>
            </div>
        </div>
        <hr>
</section>
@endsection