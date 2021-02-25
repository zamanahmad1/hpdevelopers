@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Role For User {{$user->id}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('roles.index')}}">Role List</a></li>
                            <li class="breadcrumb-item active">Edit Role {{$user->id}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Role {{$user->id}} Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ url('userroles/'.$user->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <label for="name">Select Roles</label>
                                    @foreach($role as $r)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="roles[]" type="checkbox" id="{{$r->id}}" value="{{$r->id}}" @if($user->hasRole($r->name)) checked @endif>
                                            <label for={{$r->id}} class="custom-control-label">{{$r->name}}</label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-info text-white bg-success" value="Save" id="save">
                        </div>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
