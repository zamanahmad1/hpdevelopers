@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Permission List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Permission List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Permission Tables</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="rolepermissions_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            {{--<p>
                                <a href="{{ route('rolepermissions.create') }}" class="btn btn-success">Add New User Permission</a>
                            </p>--}}
                        </div>
                        <div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                            <table id="userpermissions_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="userpermissions_table_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc  text-bold bg-primary" tabindex="0" aria-controls="userpermissions_table" rowspan="2" colspan="1"> User ID</th>
                                    <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="userpermissions_table" rowspan="2" colspan="1">Permission Name</th>
                                    @foreach($user as $u)
                                        <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="userpermissions_table" rowspan="1" colspan="2">{{$u->name}}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach($user as $u)
                                        <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="userpermissions_table">PVR</th>
                                        <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="userpermissions_table">UDP</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permission as $p)
                                    <tr role="row" class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{$p->id}}</td>
                                        <td>{{$p->name}}</td>
                                        @foreach($user as $u)
                                            <td>@if(($u->hasPermissionTo($p->name)) && !($u->hasAnyDirectPermission($p->name))){{'Yes'}}@else {{'No'}} @endif</td>
                                            <td>@if($u->hasAnyDirectPermission($p->name)){{'Yes'}}@else {{'No'}} @endif</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="sorting  text-bold bg-primary" tabindex="0" aria-controls="userpermissions_table" rowspan="1" colspan="1">Actions</td>
                                    <td></td>
                                    @foreach($user as $u)
                                        <td></td>
                                        <td>
                                            @if($u->deleted_at==null)
                                                <a href="{{ url('userpermissions/'.$u->id.'/edit') }}" class="btn btn-info my-1">Edit</a>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
