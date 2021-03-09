@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Plot  List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Plot  List</li>
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
                            <div id="plotinventories_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            <a href="{{ route('plotinventories.create') }}" class="btn btn-success">Add New
                                                Plot </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="plotinventories_table"
                                               class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                               aria-describedby="plotinventories_table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1">ID
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1"> Plot  Name
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1">Plot  Code
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1">Plot
                                                    Description
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1">Street Name
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1">Availability
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1">Creation Date
                                                    Time
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1">Updation Date
                                                    Time
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotinventories_table" rowspan="1" colspan="1">Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($plotInventory as $pi)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$pi->id}}</td>
                                                    <td><a href="plotinventories/{{$pi->id}}/details"> {{$pi->name}}</a></td>
                                                    <td>{{$pi->code}}</td>
                                                    <td>{{$pi->description}}</td>
                                                    <td>{{$street[$pi->street_code]}}</td>
                                                    <td class="
                                                    @if($pi->plotavailability_code=='available')
                                                        bg-green
                                                    @elseif($pi->plotavailability_code=='reserved')
                                                        bg-primary
                                                    @elseif($pi->plotavailability_code=='booked')
                                                        bg-yellow
                                                    @elseif($pi->plotavailability_code=='sold')
                                                        bg-dark
                                                    @elseif($pi->plotavailability_code=='cancelled')
                                                        bg-red
                                                    @endif
                                                    ">{{$plotAvailability[$pi->plotavailability_code]}}</td>
                                                    <td>{{$pi->created_at}}</td>
                                                    <td>{{$pi->updated_at}}</td>
                                                    <td>
                                                        @if($pi->deleted_at==null)
                                                            <a href="{{ route('plotinventories.edit',$pi->id) }}"
                                                               class="btn btn-info my-1">Edit</a>
                                                            <a href="javascript:void(0)"
                                                               onclick="$(this).parent().find('form').submit()"
                                                               id="confirmation" class="btn btn-danger my-1">Delete</a>
                                                            <form action="{{ route('plotinventories.destroy',$pi->id) }}"
                                                                  method="post">
                                                                @method('DELETE')
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">
                                                            </form>
                                                        @else
                                                            <a href="javascript:void(0)"
                                                               onclick="$(this).parent().find('form').submit()"
                                                               class="btn btn-success">Restore</a>
                                                            <form action="/plotinventories/restore/{{$pi->id}}" method="post">
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
