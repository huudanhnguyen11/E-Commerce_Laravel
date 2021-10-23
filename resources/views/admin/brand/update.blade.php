@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">BRAND MANAGEMENT</h2>
        <form class="forms-sample" method="post" action="{{route('admin.brand.edit')}}">
            @csrf
            <input type="hidden" name="id_update" value="{{$brand->id}}">
            <div class="form-group">
                <label for="exampleInputName1">Brand Name</label>
                <input type="text" class="form-control" name="brandname_update" value="{{$brand->brandname}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Brand Image</label>
                <input type="text" class="form-control" name="brandimg_update" value="{{$brand->brandimg}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Description</label>
                <input type="text" class="form-control" name="description_update" value="{{$brand->description}}">
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection