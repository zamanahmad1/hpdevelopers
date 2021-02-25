@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Role Permission List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Role Permission List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content overflow-auto">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header">

                        </div>
                        <!-- /.card-header -->
                        <div class="box-body">
                            <div id="rolepermissions_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        {{--<p>
                                            <a href="{{ route('rolepermissions.create') }}" class="btn btn-success">Add New Role Permission</a>
                                        </p>--}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="rolepermissions_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="rolepermissions_table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc  text-bold bg-primary" tabindex="0" aria-controls="rolepermissions_table" rowspan="1" colspan="1"> User ID</th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="rolepermissions_table" rowspan="1" colspan="1">Permission Name</th>
                                                @foreach($role as $r)
                                                    <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="rolepermissions_table" rowspan="1" colspan="1">{{$r->name}}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($permission as $p)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$p->id}}</td>
                                                    <td>{{$p->name}}</td>
                                                    @foreach($role as $r)
                                                        <td>@if($r->hasPermissionTo($p->name)){{'Yes'}}@else {{'No'}} @endif</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="sorting  text-bold bg-primary" tabindex="0" aria-controls="rolepermissions_table" rowspan="1" colspan="1">Actions</td>
                                                <td></td>
                                                @foreach($role as $r)
                                                    <td>
                                                        @if($r->deleted_at==null)
                                                            <a href="{{ url('rolepermissions/'.$r->id.'/edit') }}" class="btn btn-info my-1">Edit</a>
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
            </div>

        </section>
    </div>
@endsection
