@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">CUSTOMER MANAGEMENT</h2>
        <form class="forms-sample" method="post" action="{{route('admin.customer.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Customer Name</label>
                <input type="text" class="form-control" placeholder="Customer Name" name="customername" required>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Phone Number</label>
                <input type="text" class="form-control" placeholder="Phone number" name="phonenumber" required>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Address</label>
                <input type="text" class="form-control" placeholder="Address" name="address">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email" required>
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