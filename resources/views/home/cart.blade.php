@extends('layout.primary')
@section('content')
<div class="container" style="background-color: white;">
    <div class="row">
        <div class="main-order">
            <div class="content">
                <?php $total_price = 0; ?>
                @if(session()->has('cart'))
                @if(count($cart) > 0)
                <p><strong>Để đặt hàng,</strong>quý khách hàng vui lòng kiểm tra sản phẩm, số lượng, giá,
                    màu sắc và điền các thông tin dưới đây:</p>
                <div class="list-order">
                    <aside>
                        @foreach($cart as $id => $item)
                        <div class="p-item">
                            <div class="p-img">
                                <img style="max-width: 60%;" src="{{'../' . $item['productimage']}}" alt="">
                            </div>
                            <div class="p-entry">
                                <a style="font-size: 20px;" href="{{route('home.productdetail',['id'=>$id])}}">{{$item['productname']}}</a>
                            </div>
                            <div class="p-price">
                                <span>{{number_format(($item['price'] - ($item['price'] * $item['discount']/100)) * $item['quantity']) . 'đ'}}</span>
                            </div>
                            <div class="p-quanlity">
                                <div class="dm_up_down" style="display: flex;">
                                    <a href="{{route('home.cart.updatecart',['id'=>$id,'type'=>'down'])}}" style="margin-right: 5px;" type="button" class="btn btn-danger btn-fw">-</a>
                                    <label for="">{{$item['quantity']}}</label>
                                    <a href="{{route('home.cart.updatecart',['id'=>$id,'type'=>'up'])}}" style="margin-left: 5px;" type="button" class="btn btn-danger btn-fw">+</a>
                                    <a href="{{route('home.cart.deletecart',['id'=>$id])}}" style="margin-left: 10px;" type="button" class="btn btn-danger btn-fw">X</a>
                                </div>
                            </div>
                        </div>
                        <?php $total_price += ($item['price'] - ($item['price'] * $item['discount'] / 100)) * $item['quantity']; ?>
                        @endforeach
                    </aside>
                    <div class="total">
                        <span class="lable">Tổng tiền:</span>
                        <span class="right"><span>{{number_format($total_price)}}</span>đ</span>
                    </div>
                </div>
                <form action="{{route('home.cart.order')}}" method="POST">
                    @csrf
                    <div class="info-customer">
                        <div class="step step-1">
                            <h3 class="title">1. Thông tin khách hàng</h3>
                            <!-- thong tin khach hang -->
                            <div class="item-form">
                                <input type="text" placeholder="Họ và tên" name="customerName" required>
                            </div>
                            <div class="item-form">
                                <input type="text" placeholder="Số điện thoại" name="phone" required>
                            </div>
                            <div class="item-form">
                                <input type="text" placeholder="Nhập địa chỉ" name="address" required>
                            </div>
                            <div class="item-form">
                                <input type="text" placeholder="Nhập email" name="email" required>
                            </div>
                            <div class="item-form">
                                <input type="text" placeholder="Ghi chú" name="description">
                            </div>
                        </div>
                        <div class="step step-2">
                            <h3 class="title">2. Chọn cách thức nhận hàng</h3>
                            <p>Chọn phương thức nhận hàng sẽ giúp bạn nhận được sản phẩm nhanh hơn</p>
                            <div class="step_option">
                                <input type="radio" id="ship1" name="shippingType" value="Giao hàng tận nơi">
                                <label for="ship1">Giao hàng tận nơi (Có Phí Giao Hàng)</label>
                                <input type="radio" id="ship2" name="shippingType" value="Nhận tại cửa hàng">
                                <label for="ship2">Nhận hàng tại cửa hàng</label>
                            </div>
                            <div class="main-order">
                                <div class="item-form">
                                    <select required name="shippingCity" id="buyer_province">
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                        <option value="Hà nội">Hà nội</option>
                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                        <option value="TP HCM">TP HCM</option>
                                    </select>
                                </div>
                                <div class="item-form">
                                    <input required type="text" placeholder="Nhập địa chỉ" name="shippingAddress" id="buyer_address">
                                </div>
                            </div>
                        </div>
                        <div class="step step-3">
                            <h3>3. Chọn hình thức thanh toán</h3>
                            <div class="method-payment">
                                <div class="step_option">
                                    <input type="radio" id="pay1" name="paymentType" value="Tiền mặt">
                                    <label for="pay1">Thanh toán tiền mặt khi nhận hàng (Tiền Mặt/Quẹt Thẻ ATM,
                                        Visa, Master)</label>
                                    <input type="radio" id="pay2" name="paymentType" value="Chuyển khoản">
                                    <label for="pay2">Thanh toán qua chuyển khoản qua tài khoản ngân hàng
                                        (khuyên dùng)</label><br>
                                    <input type="radio" id="pay3" name="paymentType" value="Trả góp">
                                    <label for="pay3">Trả góp có lãi suất</label>
                                </div>
                            </div>
                            <div class="main-payment">
                                <div class="content-pay">
                                    <p>Quý khách sẽ thanh toán bằng tiền mặt khi nhận hàng. Vui lòng bấm nút " Đặt hàng" để hoàn tất.</p>
                                </div>
                            </div>
                            <div class="btn-cart">
                                <input type="submit" value="Đặt hàng" class="btn_next">
                            </div>
                        </div>
                    </div>
                </form>
                @else
                <b>Giỏ hàng bị rỗng</b>
                @endif
                @else
                @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <b>{{$message}}</b>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection