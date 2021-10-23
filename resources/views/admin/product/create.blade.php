@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">PRODUCT MANAGEMENT</h2>
        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('admin.product.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Product Name</label>
                <input type="text" class="form-control" placeholder="Product Name" name="productname">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Price</label>
                <input type="text" class="form-control" placeholder="Price" name="price">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Discount</label>
                <input type="text" class="form-control" placeholder="Discount" name="discount">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Product Image</label>
                <input type="file" class="form-control" accept="image/jpeg, image/png" placeholder="Product Image" name="productimg">
            </div>
            <div class="form-group">
                <select name="brandid" id="" class="form-control">
                    @forelse($brands as $item)
                    <option value="{{$item['id']}}">{{$item['brandname']}}</option>
                    @empty
                    <option value="0">No batch!</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <select name="categoryid" id="" class="form-control">
                    @forelse($categories as $item)
                    <option value="{{$item['id']}}">{{$item['categoryname']}}</option>
                    @empty
                    <option value="0">No batch!</option>
                    @endforelse
                </select>
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