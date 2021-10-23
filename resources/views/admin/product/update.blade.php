@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">PRODUCT MANAGEMENT</h2>
        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('admin.product.edit')}}">
            @csrf
            <input type="hidden" name="id_update" value="{{$product->id}}">
            <div class="form-group">
                <label for="exampleInputName1">Product Name</label>
                <input type="text" class="form-control" name="productname_update" value="{{$product->productname}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Price</label>
                <input type="text" class="form-control" name="price_update" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Discount</label>
                <input type="text" class="form-control" name="discount_update" value="{{$product->discount}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Product Image</label>
                <input type="text" class="form-control" name="productimg_update" value="{{$product->productimage}}">
            </div>
            <div class="form-group">
                <select name="brandid" class="form-control" id="brandcbb">
                    @forelse($brands as $item)
                    <option value="{{$item['id']}}">{{$item['brandname']}}</option>
                    @empty
                    <option value="0">No batch!</option>
                    @endforelse
                </select>
                <script>
                    var brandid = "<?php echo $product['brandid']; ?>";
                    var selectbrand = document.getElementById("brandcbb");
                    for (let index = 0; index < <?php echo count($brands); ?>; index++) {
                        if (selectbrand.options[index].value == brandid) {
                            selectbrand.options[index].selected = 'selected';
                        }
                    }
                </script>
            </div>
            <div class="form-group">
                <select name="categoryid" class="form-control" id="categorycbb">
                    @forelse($categories as $item)
                    <option value="{{$item['id']}}">{{$item['categoryname']}}</option>
                    @empty
                    <option value="0">No batch!</option>
                    @endforelse
                </select>
                <script>
                    var categoryid = "<?php echo $product['categoryid']; ?>";
                    var selectcategory = document.getElementById("categorycbb");
                    for (let index = 0; index < <?php echo count($categories); ?>; index++) {
                        if (selectcategory.options[index].value == categoryid) {
                            selectcategory.options[index].selected = 'selected';
                        }
                    }
                </script>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Description</label>
                <input type="text" class="form-control" name="description_update" value="{{$product->description}}">
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection