@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('users.index')}}">User List</a></li>
                            <li class="breadcrumb-item active">Edit User {{$user->id}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit User {{$user->id}} Form</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('users.update',$user->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" id="password_confirmation" name="confirm_password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'>&nbsp; <span id='toggleText'>Show Password</span></td>
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-info text-white" value="Save" id="save">
                        </div>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#toggle").change(function(){
                    // Check the checkbox state
                    if($(this).is(':checked')){
                        // Changing type attribute
                        $("#password").attr("type","text");
                        $("#password_confirmation").attr("type","text");

                        // Change the Text
                        $("#toggleText").text("Hide");
                    }else{
                        // Changing type attribute
                        $("#password").attr("type","password");
                        $("#password_confirmation").attr("type","password");

                        // Change the Text
                        $("#toggleText").text("Show");
                    }

                });

                $('#save').click(function (event){
                    if($("#password").val()!=$("#password_confirmation").val()){
                        alert('password and confirm password doesnot match');
                        event.preventDefault();
                    }
                });
            });
        </script>
    </div>
@endsection
