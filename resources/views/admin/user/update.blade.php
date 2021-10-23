@extends('admin.template.master')
@section('main')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">CUSTOMER MANAGEMENT</h2>
        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('admin.user.edit')}}">
            @csrf
            <input type="hidden" name="id_update" value="{{$user->id}}">
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputName1">Password</label>
                <input type="password" class="form-control" name="password" value="{{$user->password}}">
            </div> -->
            <div class="form-group">
                <label for="exampleInputName1">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Address</label>
                <input type="text" class="form-control" name="address" value="{{$user->address}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Birthday</label>
                <input type="text" class="form-control" name="birthday" value="{{$user->birthday}}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">User Image</label>
                <input type="file" class="form-control" accept="image/jpeg, image/png" name="userimage" value="{{$user->userimage}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Role Name</label>
                <select class="form-control" name="rolename" id="rolenamecbb">
                    <option value="Admin">Admin</option>
                    <option value="Sales">Sales</option>
                    <option value="Post">Post</option>
                </select>
                <script>
                    var rolename = "<?php echo $user['rolename']; ?>";
                    var selectrole = document.getElementById("rolenamecbb");
                    for (let index = 0; index < 3; index++) {
                        if (selectrole.options[index].value == rolename) {
                            selectrole.options[index].selected = 'selected';
                        }
                    }
                </script>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection