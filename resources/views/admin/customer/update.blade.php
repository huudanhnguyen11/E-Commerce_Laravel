@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">CUSTOMER MANAGEMENT</h2>
        <form class="forms-sample" method="post" action="{{route('admin.customer.edit')}}">
            @csrf
            <input type="hidden" name="id_update" value="{{$customer->id}}">
            <div class="form-group">
                <label for="exampleInputName1">Customer Name</label>
                <input type="text" class="form-control" name="customername_update" value="{{$customer->customername}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Phone Number</label>
                <input type="text" class="form-control" name="phonenumber_update" value="{{$customer->phonenumber}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Address</label>
                <input type="text" class="form-control" value="{{$customer->address}}" name="address_update">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email</label>
                <input type="text" class="form-control" value="{{$customer->email}}" name="email_update" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Description</label>
                <input type="text" class="form-control" value="{{$customer->description}}" name="description_update">
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection