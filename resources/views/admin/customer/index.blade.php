@extends('admin.template.master')
@section('main')
<h2 class="card-title">Customer Management</h2>
<a href="{{route('admin.customer.create')}}" class="btn btn-gradient-success btn-fw">Create</a>
<div class="grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->customername}}</td>
                        <td>{{$item->phonenumber}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.customer.update', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-pencil-box"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.customer.destroy', ['id'=>$item['id']])}}" style="color: darkgrenn;">
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