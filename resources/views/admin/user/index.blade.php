@extends('admin.template.master')
@section('main')
<h2 class="card-title">User Management</h2>
<a href="{{route('admin.user.create')}}" class="btn btn-gradient-success btn-fw">Create</a>
<div class="grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- <th>Password</th> -->
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Birthday</th>
                        <th>Role Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><img style="width: 50px; height: 50px;" src="{{$item->userimage}}" alt=""></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <!-- <td>{{$item->password}}</td> -->
                        <td>{{$item->phone}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->birthday}}</td>
                        <td>{{$item->rolename}}</td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.user.update', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-pencil-box"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.user.destroy', ['id'=>$item['id']])}}" style="color: darkgrenn;">
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