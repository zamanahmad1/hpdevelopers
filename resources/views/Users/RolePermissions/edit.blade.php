@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Role For User {{$role->id}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('roles.index')}}">Role List</a></li>
                            <li class="breadcrumb-item active">Edit Role {{$role->id}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Role {{$role->id}} Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ url('rolepermissions/'.$role->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <label for="name">Select Roles</label>
                                    @foreach($permission as $p)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="permission[]" type="checkbox" id="{{$p->id}}" value="{{$p->id}}" @if($role->hasPermissionTo($p->name)) checked @endif>
                                            <label for={{$p->id}} class="custom-control-label">{{$p->name}}</label>
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
