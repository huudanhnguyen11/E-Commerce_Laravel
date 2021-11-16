@extends('admin.template.master')
@section('main')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<h2 class="card-title">Brand Management</h2>
<a href="{{route('admin.brand.create')}}" class="btn btn-gradient-success btn-fw">Create</a>
<div class="grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Brand Name</th>
                        <th>Brand Image</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->brandname}}</td>
                        <td><img style="width: 50px; height: 50px;" src="{{$item->brandimg}}" alt=""></td>
                        <td>{{$item->description}}</td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.brand.update', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-pencil-box"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.brand.destroy', ['id'=>$item['id']])}}" style="color: darkgrenn;">
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