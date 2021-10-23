@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">USER MANAGEMENT</h2>
        <form class="forms-sample" method="post" action="{{route('admin.user.changepassword')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">New Password</label>
                <input type="password" class="form-control" name="newpassword">
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputName1">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div> -->
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection