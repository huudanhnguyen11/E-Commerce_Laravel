@extends('admin.template.master')
@section('main')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-body">
        <h2 class="card-title">BRAND MANAGEMENT</h2>
        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('admin.brand.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Brand Name</label>
                <input type="text" class="form-control" placeholder="Brand Name" name="brandname">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Brand Image</label>
                <input type="file" class="form-control" accept="image/jpeg, image/png" placeholder="Brand Image" name="brandimg">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Description</label>
                <input type="text" class="form-control" placeholder="Description" name="description">
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection