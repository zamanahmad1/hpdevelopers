@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Member </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('memberprofiles.index')}}">Member List</a></li>
                            <li class="breadcrumb-item active">Create New Member</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Member Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('memberprofiles.store') }}">
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
                                <label>CNIC</label>
                                <input type="text" name="cnic" id="cnic" class="form-control" placeholder="enter 13 digit CNIC No">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Father Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CNIC Issuance</label>
                                <input type="date" name="cnic_issuance" id="cnic_issuance" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CNIC Expiry</label>
                                <input type="date" name="cnic_expiry" id="cnic_expiry" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="number" name="mobile_no" id="mobile_no" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>LandLine Number</label>
                                <input type="number" name="landline_no" id="landline_no" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Inhensive Features</label>
                                {{--@foreach($plotInhensiveFeature as $pif)
                                    <div class="custom-control custom-checkbox pl-5">
                                        <input class="custom-control-input" name="inhensiveFeature[]" type="checkbox" id="{{$pif->id}}" value="{{$pif->code}}">
                                        <label for={{$pif->id}} class="custom-control-label">{{$pif->name}}</label>
                                    </div>
                                @endforeach--}}
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
