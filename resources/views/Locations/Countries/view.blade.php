@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Country List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Country List</li>
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
                            <div id="countries_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            <a href="{{ route('countries.create') }}" class="btn btn-success">Add New
                                                Country</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="countries_table"
                                               class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                               aria-describedby="countries_table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc  text-bold bg-primary" tabindex="0"
                                                    aria-controls="countries_table" rowspan="1" colspan="1">ID
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="countries_table" rowspan="1" colspan="1"> Country Name
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="countries_table" rowspan="1" colspan="1">Country Code
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="countries_table" rowspan="1" colspan="1">Country
                                                    Description
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="countries_table" rowspan="1" colspan="1">Creation Date
                                                    Time
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="countries_table" rowspan="1" colspan="1">Updation Date
                                                    Time
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="countries_table" rowspan="1" colspan="1">Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($country as $c)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$c->id}}</td>
                                                    <td>{{$c->name}}</td>
                                                    <td>{{$c->code}}</td>
                                                    <td>{{$c->description}}</td>
                                                    <td>{{$c->created_at}}</td>
                                                    <td>{{$c->updated_at}}</td>
                                                    <td>
                                                        @if($c->deleted_at==null)
                                                            <a href="{{ route('countries.edit',$c->id) }}"
                                                               class="btn btn-info my-1">Edit</a>
                                                            <a href="javascript:void(0)"
                                                               onclick="$(this).parent().find('form').submit()"
                                                               id="confirmation" class="btn btn-danger my-1">Delete</a>
                                                            <form action="{{ route('countries.destroy',$c->id) }}"
                                                                  method="post">
                                                                @method('DELETE')
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">
                                                            </form>
                                                        @else
                                                            <a href="javascript:void(0)"
                                                               onclick="$(this).parent().find('form').submit()"
                                                               class="btn btn-success">Restore</a>
                                                            <form action="/countries/restore/{{$c->id}}" method="post">
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
