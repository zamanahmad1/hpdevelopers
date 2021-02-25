@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Permission {{$permission->id}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('permissions.index')}}">Permission List</a></li>
                            <li class="breadcrumb-item active">Edit Permission {{$permission->id}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Permission {{$permission->id}} Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('permissions.update',$permission->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$permission->name}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Guard</label>
                                <select class="form-control" name="guard_name">
                                    <option name="guard_name" value="">Select Guard</option>
                                    <option value="web" @if($permission->guard_name=='web') selected @endif>Web Guard</option>
                                </select>
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
    </div>
@endsection
