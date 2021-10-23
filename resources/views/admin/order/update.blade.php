@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">ORDER MANAGEMENT</h2>
        <form class="forms-sample" method="post" action="{{route('admin.order.edit')}}">
            @csrf
            <input type="hidden" name="id_update" value="{{$order->id}}">
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control" name="statusorder" id="statuscbb">
                    <option value="Đang xử lý">Đang xử lý</option>
                    <option value="Hoàn thành">Hoàn thành</option>
                </select>
                <script>
                    var status = "<?php echo $order['statusorder']; ?>";
                    var select = document.getElementById("statuscbb");
                    for (let index = 0; index < 2; index++) {
                        if (select.options[index].value == status) {
                            select.options[index].selected = 'selected';
                        }
                    }
                </script>
            </div>
            <div class="form-group">
                <label for="statuspayment">Thanh toán</label>
                <select class="form-control" name="statuspayment" id="paymentcbb">
                    <option value="Thanh toán tiền mặt" selected>Thanh toán tiền mặt</option>
                    <option value="Thanh toán chuyển khoản">Thanh toán chuyển khoản</option>
                    <option value="Trả góp có lãi suất">Trả góp có lãi suất</option>
                </select>
                <script>
                    var payment = "<?php echo $order['statuspayment']; ?>";
                    var select = document.getElementById("paymentcbb");
                    for (let index = 0; index < 3; index++) {
                        if (select.options[index].value == payment) {
                            select.options[index].selected = 'selected';
                        }
                    }
                </script>
            </div>
            <div class="form-group">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $item)
                        <tr>
                            <td>{{$item->productid}}</td>
                            <td>{{$item->productname}}</td>
                            <td>

                                @if($item->quantity > 1)
                                <a class="btn btn-outline-warning btn-fw mr-2" style="min-width: 30px!important;padding-left: 5px;padding-right: 5px;" href="{{route('admin.order.quantityupdate',
                                    ['oid'=>$order->id, 'odid'=>$item->orderdetailid, 'type'=>'down', 'quantity'=>$item->quantity])}}">-</a>
                                @else
                                <input class="btn btn-outline-warning btn-fw mr-2" value="-" style="width: 30px ;min-width: 30px!important;padding-left: 5px;padding-right: 5px;">
                                @endif
                                <label style="margin-top: 15px;" for="">{{ $item->quantity }}</label>
                                <a class="btn btn-outline-info btn-fw ml-2" style="min-width: 30px!important;padding-left: 5px;padding-right: 5px;" href="{{route('admin.order.quantityupdate',
                                    ['oid'=>$order->id, 'odid'=>$item->orderdetailid, 'type'=>'up', 'quantity'=>$item->quantity])}}">+</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Chưa có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection