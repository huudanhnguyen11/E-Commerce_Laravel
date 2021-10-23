@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">CATEGORY MANAGEMENT</h2>
        <form class="forms-sample" method="post" action="{{route('admin.category.edit')}}">
            @csrf
            <input type="hidden" name="id_update" value="{{$category->id}}">
            <div class="form-group">
                <label for="exampleInputName1">Category Name</label>
                <input type="text" class="form-control" name="categoryname_update" value="{{$category->categoryname}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Description</label>
                <input type="text" class="form-control" name="description_update" value="{{$category->description}}">
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection