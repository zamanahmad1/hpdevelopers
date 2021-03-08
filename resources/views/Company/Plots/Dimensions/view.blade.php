@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Plot Dimension List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Plot Dimension List</li>
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
                            <div id="plotdimensions_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            <a href="{{ route('plotdimensions.create') }}" class="btn btn-success">Add New
                                                Plot Dimension</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="plotdimensions_table"
                                               class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                               aria-describedby="plotdimensions_table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1">ID
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1"> Plot Dimension Name
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1">Plot Dimension Code
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1">Plot Dimension
                                                    Description
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1">Plot Name
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1">Length
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1">Creation Date
                                                    Time
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1">Updation Date
                                                    Time
                                                </th>
                                                @if(auth()->user()->hasRole('Administrator'))
                                                    <th class="sorting  text-bold bg-primary" tabindex="0"
                                                        aria-controls="plotdimensions_table" rowspan="1" colspan="1">Deletion Date
                                                        Time
                                                    </th>
                                                @endif
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotdimensions_table" rowspan="1" colspan="1">Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($plotDimension as $pd)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$pd->id}}</td>
                                                    <td>{{$pd->name}}</td>
                                                    <td>{{$pd->code}}</td>
                                                    <td>{{$pd->description}}</td>
                                                    <td>{{$plot[$pd->plot_code]}}</td>
                                                    <td>{{$pd->length}} Feet</td>
                                                    <td>{{$pd->created_at}}</td>
                                                    <td>{{$pd->updated_at}}</td>
                                                    @if(auth()->user()->hasRole('Administrator'))
                                                        <td>{{$pd->deleted_at}}</td>
                                                    @endif
                                                    <td>
                                                        @if($pd->deleted_at==null)
                                                            <a href="{{ route('plotdimensions.edit',$pd->id) }}"
                                                               class="btn btn-info my-1">Edit</a>
                                                            {{--@if(auth()->user()->hasRole('Administrator'))
                                                                <a href="javascript:void(0)"
                                                                   onclick="$(this).parent().find('form').submit()"
                                                                   id="confirmation" class="btn btn-danger my-1">Delete</a>
                                                                <form action="{{ route('plotdimensions.destroy',$pd->id) }}"
                                                                      method="post">
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="_token"
                                                                           value="{{ csrf_token() }}">
                                                                </form>
                                                            @endif--}}
                                                        @else
                                                            {{--@if(auth()->user()->hasRole('Administrator'))
                                                                <a href="javascript:void(0)"
                                                                   onclick="$(this).parent().find('form').submit()"
                                                                   class="btn btn-success">Restore</a>
                                                                <form action="/plotdimensions/restore/{{$pd->id}}" method="post">
                                                                    @method('PUT')
                                                                    <input type="hidden" name="_token"
                                                                           value="{{ csrf_token() }}">
                                                                </form>
                                                            @endif--}}
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
