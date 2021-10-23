@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">CUSTOMER MANAGEMENT</h2>
        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('admin.user.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputName1">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div> -->
            <div class="form-group">
                <label for="exampleInputName1">Phone</label>
                <input type="text" class="form-control" placeholder="Phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Address</label>
                <input type="text" class="form-control" placeholder="Address" name="address">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Birthday</label>
                <input type="text" class="form-control" placeholder="yyyy/mm/dd" name="birthday">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">User Image</label>
                <input type="file" class="form-control" accept="image/jpeg, image/png" placeholder="User Image" name="userimage">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Role Name</label>
                <select class="form-control" name="rolename">
                    <option value="Admin">Admin</option>
                    <option value="Sales">Sales</option>
                    <option value="Post">Post</option>
                </select>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection