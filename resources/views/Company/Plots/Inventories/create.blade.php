@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Plot </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('plotinventories.index')}}">Plot List</a></li>
                            <li class="breadcrumb-item active">Create New Plot</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Plot Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('plotinventories.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" id="code" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Area</label>
                                <input type="number" name="area" id="area" class="form-control" placeholder="enter only numeric value">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Street</label>
                                <select name="street" id="street" class="form-control">
                                    <option value="" >Select Street</option>
                                    @foreach($street as $s)
                                        <option value="{{$s->code}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Size</label>
                                <select name="size" id="size" class="form-control">
                                    <option value="">Select Plot Size</option>
                                    @foreach($plotSize as $ps)
                                        <option value="{{$ps->code}}">{{$ps->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select Plot Category</option>
                                    @foreach($plotCategory as $pc)
                                        <option value="{{$pc->code}}">{{$pc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select Plot Type</option>
                                    @foreach($plotType as $pt)
                                        <option value="{{$pt->code}}">{{$pt->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Plot Status</option>
                                    @foreach($plotStatus as $ps)
                                        <option value="{{$ps->code}}">{{$ps->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Shape</label>
                                <select name="shape" id="shape" class="form-control">
                                    <option value="">Select Plot Shape</option>
                                    @foreach($plotShape as $ps)
                                        <option value="{{$ps->code}}">{{$ps->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Availability</label>
                                <select name="availability" id="availability" class="form-control">
                                    <option value="">Select Plot Availability</option>
                                    @foreach($plotAvailability as $pa)
                                        <option value="{{$pa->code}}">{{$pa->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Inhensive Features</label>
                                @foreach($plotInhensiveFeature as $pif)
                                    <div class="custom-control custom-checkbox pl-5">
                                        <input class="custom-control-input" name="inhensiveFeature[]" type="checkbox" id="{{$pif->id}}" value="{{$pif->code}}">
                                        <label for={{$pif->id}} class="custom-control-label">{{$pif->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5"></textarea>
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
                        alert('Plot Name Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#code').val()=='' ){
                        alert('Plot Code Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#area').val()==''){
                        alert('Plot Area Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#street').val()==''){
                        alert('Plot Street Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#size').val()==''){
                        alert('Plot Size Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#category').val()==''){
                        alert('Plot Category Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#type').val()==''){
                        alert('Plot Type Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#status').val()==''){
                        alert('Plot Status Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#shape').val()==''){
                        alert('Plot Shape Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#availability').val()==''){
                        alert('Plot Availability Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#description').val()==''){
                        alert('Plot Description Cannot be Empty')
                        event.preventDefault();
                    }
                    if ($('#area').val() <=0){
                        alert('Plot Description Cannot be Zero or Negitive')
                        event.preventDefault();
                    }

                })
            });
        </script>
    </div>
@endsection
