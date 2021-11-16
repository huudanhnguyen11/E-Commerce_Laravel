@extends('admin.template.master')
@section('main')
<h2 class="card-title">OrderDetail Management</h2>
<div class="grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <div>
                <div style="float: left; width: 50%;">
                    <h5>Thông tin khách hàng:</h5>
                    <div style="padding-left: 30px;">
                        <ul style="list-style-type:circle">
                            <b><li>Tên khách hàng: {{$order->customer['customername']}}</li></b>
                            <b><li>Số điện thoại: {{$order->customer['phonenumber']}}</li></b>
                            <b><li>Địa chỉ: {{$order->customer['address']}}</li></b>
                            <b><li>Email: {{$order->customer['email']}}</li></b>
                            <b><li>Description: {{$order->customer['description']}}</li></b>
                        </ul>
                    </div>
                </div>
                <div style="float: right; width: 50%;   ">
                    <h5>Thông tin trạng thái:</h5>
                    <div style="padding-left: 30px;">
                        <ul style="list-style-type:circle">
                            <b><li>Ngày tạo đơn hàng: {{date("d-m-Y",strtotime($order->createddate))}}</li></b>
                            <b><li>Trạng thái đơn hàng: {{$order->statusorder}}</li></b>
                            <b><li>Địa chỉ: {{$order->shippingaddress}}</li></b>
                            <b><li>Thành phố: {{$order->shippingcity}}</li></b>
                            <b><li>Trạng thái thanh toán: {{$order->paymenttype}}</li></b>
                            <b><li>Cách thức nhận hàng: {{$order->shippingtype}}</li></b>
                        </ul>
                    </div>
                </div>
                <table class="table table-hover">
                    <?php $total_price = 0; ?>
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Discount</th>
                            <th>Image</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderdetail as $item)
                        <tr>
                            <td>{{$item->productname}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->discount}}</td>
                            <td><img width="60px" height="75px" src="{{'../' . $item->productimage}}" alt=""></td>
                            <td> {{$item->quantity}}</td>
                        </tr>
                        <?php $total_price += ($item['price'] - ($item['price'] * $item['discount']/100)) * $item['quantity']; ?>
                    </tbody>
                    @endforeach
                </table>
                <div style="float: right; font-size: 1.10em;">
                    <label><b>Tổng tiền: </b><label style="color: red;">{{number_format($total_price) . 'đ'}}</label></label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection