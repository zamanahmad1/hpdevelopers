@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Role List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Role List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Role Tables</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="roles_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p>
                                <a href="{{ route('roles.create') }}" class="btn btn-success">Add New Role</a>
                            </p>
                        </div>
                        <div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                            <table id="roles_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="roles_table_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc  text-bold bg-primary" tabindex="0" aria-controls="roles_table" rowspan="1" colspan="1">ID</th>
                                    <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="roles_table" rowspan="1" colspan="1">Name</th>
                                    <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="roles_table" rowspan="1" colspan="1">Guard Name</th>
                                    <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="roles_table" rowspan="1" colspan="1">Creation Date Time</th>
                                    <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="roles_table" rowspan="1" colspan="1">Updation Date Time</th>
                                    <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="roles_table" rowspan="1" colspan="1">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($role as $r)
                                    <tr role="row" class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{$r->id}}</td>
                                        <td>{{$r->name}}</td>
                                        <td>{{$r->guard_name}}</td>
                                        <td>{{$r->created_at}}</td>
                                        <td>{{$r->updated_at}}</td>
                                        <td>
                                            @if($r->deleted_at==null)
                                                <a href="{{ route('roles.edit',$r->id) }}" class="btn btn-info my-1">Edit</a>
                                                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger my-1">Delete</a>
                                                <form action="{{ route('roles.destroy',$r->id) }}" method="post">
                                                    @method('DELETE')
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                            @else
                                                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-success">Restore</a>
                                                <form action="/roles/restore/{{$r->id}}" method="post">
                                                    @method('PUT')
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
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
@endsection
