@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Role List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Role List</li>
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
                            <div id="userroles_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        {{--<p>
                                            <a href="{{ route('userroles.create') }}" class="btn btn-success">Add New User Role</a>
                                        </p>--}}
                                    </div>
                                    <div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="userroles_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="userroles_table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc  text-bold bg-primary" tabindex="0" aria-controls="userroles_table" rowspan="1" colspan="1"> User ID</th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="userroles_table" rowspan="1" colspan="1">User Name</th>
                                                @foreach($role as $r)
                                                    <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="userroles_table" rowspan="1" colspan="1">{{$r->name}}</th>
                                                @endforeach
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="userroles_table" rowspan="1" colspan="1">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user as $u)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$u->id}}</td>
                                                    <td>{{$u->name}}</td>
                                                    @foreach($role as $r)
                                                        <td>@if($u->hasRole($r->name)){{'Yes'}}@else {{'No'}} @endif</td>
                                                    @endforeach
                                                    <td>
                                                        @if($r->deleted_at==null)
                                                            <a href="{{ url('userroles/'.$u->id.'/edit') }}" class="btn btn-info my-1">Edit</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
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
