@extends('admin.template.master')
@section('main')
<h2 class="card-title">Product Management</h2>
<a href="{{route('admin.product.create')}}" class="btn btn-gradient-success btn-fw">Create</a>
<div class="grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->productname}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->discount}}</td>
                        <td><img style="width: 50px; height: 50px;" src="{{$item->productimage}}" alt=""></td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.product.update', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-pencil-box"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.product.destroy', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </div>
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
    </div>
</div>
@endsection