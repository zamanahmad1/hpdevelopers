@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Plot Dimension </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('plotdimensions.index')}}">Plot Dimension List</a></li>
                            <li class="breadcrumb-item active">Edit Plot Dimension For {{$plot->name}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Plot Dimension For {{$plot->name}} Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('plotdimensions.update', $plotDimension->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$plotDimension->name}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" id="code" class="form-control" value="{{$plotDimension->code}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Plots</label>
                                <select name="plot_code" id="plot" class="form-control">
                                    <option value="" name="plot_code">Select Plot</option>
                                    @foreach($plotInventory as $pi)
                                        <option value="{{$pi->code}}" @if($plotDimension->plot_code==$pi->code) selected @endif>{{$pi->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Length</label>
                                <input type="number" name="length" id="length"  step="0.01" class="form-control" value="{{$plotDimension->length}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5">{{$plotDimension->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-info text-white bg-success" value="Save" id="save">
                        </div>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#save').click(function (event){
                    if ($('#name').val()=='' ){
                        alert('Plot Dimension Name Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#code').val()=='' ){
                        alert('Plot Dimension Code Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#plot').val()==''){
                        alert('Kindly Select Plot First')
                        event.preventDefault();
                    }
                    if($('#length').val()=='' ){
                        alert('Plot Dimension Length Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#description').val()==''){
                        alert('Plot Dimension Description Cannot be Empty')
                        event.preventDefault();
                    }

                })
            });
        </script>
    </div>
@endsection
