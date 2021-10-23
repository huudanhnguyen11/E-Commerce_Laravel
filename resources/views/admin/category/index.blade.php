@extends('admin.template.master')
@section('main')
<h2 class="card-title">Category Management</h2>
<a href="{{route('admin.category.create')}}" class="btn btn-gradient-success btn-fw">Create</a>
<div class="grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->categoryname}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.category.update', ['id'=>$item['id']])}}" style="color: darkgrenn;">
                                    <i class="mdi mdi-pencil-box"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div style="font-size: 40px;">
                                <a href="{{route('admin.category.destroy', ['id'=>$item['id']])}}" style="color: darkgrenn;">
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