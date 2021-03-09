@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Details Plot </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('plotinventories.index')}}">Plot List</a></li>
                            <li class="breadcrumb-item active">View Details Plot {{$plotInventory->id}}</li>
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
                                            <a href="{{ route('plotinventories.edit',$plotInventory) }}" class="btn btn-primary">Edit
                                                Plot 1</a>
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
                                                    <tr role="row" class="bg-primary">
                                                        <th class="text-center" colspan="4"><h2>View Details Plot {{$plotInventory->id}}</h2></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr role="row">
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">SOCIETY
                                                        </th>
                                                        <td>{{$society->name}}</td>
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">SECTOR
                                                        </th>
                                                        <td>{{$sector->name}}</td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">BLOCK
                                                        </th>
                                                        <td>{{$block->name}}</td>
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">STREET
                                                        </th>
                                                        <td>{{$street->name}}</td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">ID
                                                        </th>
                                                        <td>{{$plotInventory->id}}</td>
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">NAME
                                                        </th>
                                                        <td>{{$plotInventory->name}}</td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">CODE
                                                        </th>
                                                        <td>{{$plotInventory->code}}</td>
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">AREA
                                                        </th>
                                                        <td>{{$plotInventory->area}} SQFT</td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">SIZE
                                                        </th>
                                                        <td>{{$plotSize->name}}</td>
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">CATEGORY
                                                        </th>
                                                        <td>{{$plotCategory->name}}</td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">TYPE
                                                        </th>
                                                        <td>{{$plotType->name}}</td>
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">STATUS
                                                        </th>
                                                        <td>{{$plotStatus->name}}</td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">SHAPE
                                                        </th>
                                                        <td>{{$plotShape->name}}</td>
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">AVAILABILITY
                                                        </th>
                                                        <td>{{$plotAvailability->name}}</td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">INHENSIVE FEATURES
                                                        </th>
                                                        <td>@if($plotInventory->inhensivefeature_code!='')
                                                                @php
                                                                    for ($i=0; $i< count($inhensiveFeature); $i++){
                                                                        echo $inhensiveFeature[$temp[$i]][0]->name."<br>";
                                                                    }
                                                                @endphp
                                                            @endif
                                                        </td>
                                                        <th class="sorting_asc  text-bold bg-success" tabindex="0"
                                                            aria-controls="plotinventories_table" rowspan="1" colspan="1">DESCRIPTION
                                                        </th>
                                                        <td>{{$plotInventory->description}}</td>
                                                    </tr>
                                                </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
