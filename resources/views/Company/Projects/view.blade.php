@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project  List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Project List</li>
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
                            <div id="projects_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            <a href="{{ route('projects.create') }}" class="btn btn-success">Add New Project</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="projects_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="projects_table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc  text-bold bg-primary" tabindex="0" aria-controls="projects_table" rowspan="1" colspan="1">ID</th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="projects_table" rowspan="1" colspan="1"> Project Name</th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="projects_table" rowspan="1" colspan="1">Project Code</th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="projects_table" rowspan="1" colspan="1">Project Description</th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="projects_table" rowspan="1" colspan="1">Creation Date Time</th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="projects_table" rowspan="1" colspan="1">Updation Date Time</th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0" aria-controls="projects_table" rowspan="1" colspan="1">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($project as $p)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$p->id}}</td>
                                                    <td>{{$p->name}}</td>
                                                    <td>{{$p->code}}</td>
                                                    <td>{{$p->description}}</td>
                                                    <td>{{$p->created_at}}</td>
                                                    <td>{{$p->updated_at}}</td>
                                                    <td>
                                                        @if($p->deleted_at==null)
                                                            <a href="{{ route('projects.edit',$p->id) }}" class="btn btn-info my-1">Edit</a>
                                                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" id="confirmation" class="btn btn-danger my-1">Delete</a>
                                                            <form action="{{ route('projects.destroy',$p->id) }}" method="post">
                                                                @method('DELETE')
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            </form>
                                                        @else
                                                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-success">Restore</a>
                                                            <form action="/project/restore/{{$p->id}}" method="post">
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
            </div>
        </section>
        <script>
            $(document).ready(function() {
                $("#confirmation").click(function() {
                    confirm({
                        title: "Delete confirmation"
                    });
                });
            });
        </script>
    </div>
@endsection
