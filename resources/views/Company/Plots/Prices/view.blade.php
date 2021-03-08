@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Plot Price List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Plot Price List</li>
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
                            <div id="plotprices_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            <a href="{{ route('plotprices.update') }}" class="btn btn-success">Update
                                                Plot Prices</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="plotprices_table"
                                               class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                               aria-describedby="plotprices_table_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1">ID
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1"> Plot Price Name
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1">Plot Price Code
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1">Plot Price
                                                    Description
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1">Plot Name
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1">Installment Price
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1">Cash Price
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1">Creation Date
                                                    Time
                                                </th>
                                                <th class="sorting  text-bold bg-primary" tabindex="0"
                                                    aria-controls="plotprices_table" rowspan="1" colspan="1">Updation Date
                                                    Time
                                                </th>
                                                @if(auth()->user()->hasRole('Administrator'))
                                                    <th class="sorting  text-bold bg-primary" tabindex="0"
                                                        aria-controls="plotprices_table" rowspan="1" colspan="1">Deletion Date
                                                        Time
                                                    </th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($plotPrice as $pp)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$pp->id}}</td>
                                                    <td>{{$pp->name}}</td>
                                                    <td>{{$pp->code}}</td>
                                                    <td>{{$pp->description}}</td>
                                                    <td>{{$plotInventory[$pp->plot_code]}}</td>
                                                    <td>{{number_format($pp->installment_price)}}</td>
                                                    <td>{{number_format($pp->cash_price)}}</td>
                                                    <td>{{$pp->created_at}}</td>
                                                    <td>{{$pp->updated_at}}</td>
                                                    @if(auth()->user()->hasRole('Administrator'))
                                                        <td>{{$pp->deleted_at}}</td>
                                                    @endif
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
