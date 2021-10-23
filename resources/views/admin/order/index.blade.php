@extends('admin.template.master')
@section('main')
<h2 class="card-title">Product Management</h2>
<a href="{{route('admin.order.create')}}" class="btn btn-gradient-success btn-fw">Create</a>
<div class="grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>
                        <th>Chi tiết</th>
                        <th>Update</th>
                        <!-- <th>Delete</th> -->
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href="{{route('admin.customer.update',['id'=>$item['customerid']])}}">{{$item->customer['customername']}}</a></td>
                        <td>{{date("d-m-Y",strtotime($item->createddate))}}</td>
                        <td>{{$item->statusorder}}</td>
                        <td>{{$item->paymenttype}}</td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.orderdetail.index', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-clipboard-check"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.order.update', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-pencil-box"></i>
                                </a>
                            </div>
                        </td>
                        <!-- <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.product.destroy', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </div>
                        </td> -->
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">Chưa có dữ liệu</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection