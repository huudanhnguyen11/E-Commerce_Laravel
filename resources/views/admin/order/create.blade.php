@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">ORDER MANAGEMENT</h2>
        <form class="forms-sample" method="post" action="{{route('admin.order.store')}}">
            @csrf
            <div class="form-group">
                <label>CustomerName</label>
                <select class="form-control" name="customerid" required>
                    <option value="" selected>--- Mời chọn khách hàng ---</option>
                    @forelse($customers as $item)
                    <option value="{{$item['id']}}">{{$item['customername']}}</option>
                    @empty
                    <option value="0">No customer!</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control" name="statusorder" id="statuscbb">
                    <option value="Đang xử lý">Đang xử lý</option>
                    <option value="Hoàn thành">Hoàn thành</option>
                </select>
            </div>
            <div class="form-group">
                <label>ShippingAddress</label>
                <input type="text" class="form-control" placeholder="Address" name="shippingaddress">
            </div>
            <div class="form-group">
                <label for="exampleInputPrice1">ShippingCity</label>
                <select class="form-control" name="shippingcity">
                    <option value="Hà nội">Hà nội</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="TP HCM">TP HCM</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPrice1">Trạng thái</label>
                <select class="form-control" name="shippingtype">
                    <option value="Đặt hàng">Giao hàng tận nơi</option>
                    <option value="Nhận hàng">Nhận hàng tại cửa hàng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="statuspayment">Thanh toán</label>
                <select class="form-control" name="statuspayment">
                    <option value="Thanh toán tiền mặt" selected>Thanh toán tiền mặt</option>
                    <option value="Thanh toán chuyển khoản">Thanh toán chuyển khoản</option>
                    <option value="Trả góp có lãi suất">Trả góp có lãi suất</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sản phẩm</label>
                <select class="form-control" multiple name="productlist[]" style="overflow: scroll; height: 200px;">
                    @forelse($products as $item)
                    <option value="{{$item['id']}}">{{$item['productname']}}</option>
                    @empty
                    <option value="0">No batch!</option>
                    @endforelse
                </select>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection