@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Membership List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Membership List</li>
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
                            <div id="memberships_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            <a href="{{ route('memberships.create') }}" class="btn btn-success">Add New
                                                Membership</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="memberships_table"
                                               class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                               aria-describedby="memberships_table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc  text-bold bg-primary" tabindex="0"
                                                    aria-controls="memberships_table" rowspan="1" colspan="1">ID
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="memberships_table" rowspan="1" colspan="1">Membership Code
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="memberships_table" rowspan="1" colspan="1">Membership
                                                    Description
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="memberships_table" rowspan="1" colspan="1">Society
                                                    Name
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="memberships_table" rowspan="1" colspan="1">Creation Date
                                                    Time
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="memberships_table" rowspan="1" colspan="1">Updation Date
                                                    Time
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="memberships_table" rowspan="1" colspan="1">Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($memberShip as $ms)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$ms->id}}</td>
                                                    <td>{{$ms->code}}</td>
                                                    <td>{{$ms->description}}</td>
                                                    <td>{{$society[$ms->society_code]->name}}</td>
                                                    <td>{{$ms->created_at}}</td>
                                                    <td>{{$ms->updated_at}}</td>
                                                    <td>
                                                        @if($ms->deleted_at==null)
                                                            <a href="{{ route('memberships.edit',$ms->id) }}"
                                                               class="btn btn-info my-1">Edit</a>
                                                            <a href="javascript:void(0)"
                                                               onclick="$(this).parent().find('form').submit()"
                                                               id="confirmation" class="btn btn-danger my-1">Delete</a>
                                                            <form action="{{ route('memberships.destroy',$ms->id) }}"
                                                                  method="post">
                                                                @method('DELETE')
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">
                                                            </form>
                                                        @else
                                                            <a href="javascript:void(0)"
                                                               onclick="$(this).parent().find('form').submit()"
                                                               class="btn btn-success">Restore</a>
                                                            <form action="/memberships/restore/{{$ms->id}}" method="post">
                                                                @method('PUT')
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">
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
            $(document).ready(function () {

            });
        </script>
    </div>
@endsection
