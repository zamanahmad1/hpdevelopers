@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Member Profile {{$memberProfile->id}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('memberprofiles.index')}}">Member Profile List</a></li>
                            <li class="breadcrumb-item active">Edit Member Profile {{$memberProfile->id}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Member Profile {{$memberProfile->id}} Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('memberprofiles.update',$memberProfile->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$memberProfile->name}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" id="code" class="form-control" value="{{$memberProfile->code}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CNIC</label>
                                <input type="text" name="cnic" id="cnic" class="form-control" placeholder="enter 13 digit CNIC No" value="{{$memberProfile->cnic}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="{{$memberProfile->dob}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Father Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control" value="{{$memberProfile->father_name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{$memberProfile->address}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CNIC Issuance</label>
                                <input type="date" name="cnic_issuance" id="cnic_issuance" class="form-control" value="{{$memberProfile->cnic_issuance}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CNIC Expiry</label>
                                <input type="date" name="cnic_expiry" id="cnic_expiry" class="form-control" value="{{$memberProfile->cnic_expiry}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile_no" id="mobile_no"  class="form-control" value="{{$memberProfile->mobile_no}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Resedential Number</label>
                                <input type="text" name="resedential_no" id="resedential_no" class="form-control" value="{{$memberProfile->resedential_no}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Notification Number</label>
                                <input type="text" name="notification_no" id="notification_no" class="form-control" value="{{$memberProfile->notification_no}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Picture</label>
                                <input type="file" name="picture" id="picture" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CNIC Front</label>
                                <input type="file" name="cnic_front" id="cnic_front" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CNIC Back</label>
                                <input type="file" name="cnic_back" id="cnic_back" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Country</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach($country as $c)
                                        <option value="{{$c->code}}"
                                        @if($memberProfile->country_code==$c->code)
                                            selected
                                        @endif
                                        >{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Province</label>
                                <select name="province" id="province" class="form-control">
                                    <option value="">Select Province</option>
                                    @foreach($province as $p)
                                        <option value="{{$p->code}}"
                                            @if($memberProfile->province_code==$p->code)
                                                selected
                                            @endif
                                        >{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>City</label>
                                <select name="city" id="city" class="form-control">
                                    <option value="">Select City</option>
                                    @foreach($city as $c)
                                        <option value="{{$c->code}}"
                                            @if($memberProfile->city_code==$c->code)
                                                selected
                                            @endif
                                        >{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$memberProfile->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5">{{$memberProfile->description}}</textarea>
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
                        alert('Member Profile Name Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#code').val()=='' ){
                        alert('Member Profile Code Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#cnic').val()==''){
                        alert('Member Profile CNIC Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#dob').val()==''){
                        alert('Member Profile Date of Birth Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#father_name').val()==''){
                        alert('Member Profile Father Name Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#category').val()==''){
                        alert('Member Profile Category Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#address').val()==''){
                        alert('Member Profile Address Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#cnic_issuance').val()==''){
                        alert('Member Profile CNIC Issuance Date Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#cnic_expiry').val()==''){
                        alert('Member Profile CNIC Expiry Date Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#mobile_no').val()==''){
                        alert('Member Profile Mobile Number Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#resedential_no').val()==''){
                        alert('Member Profile Resedential Number Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#notification_no').val()==''){
                        alert('Member Profile Notification Number Cannot be Empty')
                        event.preventDefault();
                    }
                    if ($('#country').val() <=0){
                        alert('Select Country')
                        event.preventDefault();
                    }
                    if ($('#provicne').val() <=0){
                        alert('Select Province')
                        event.preventDefault();
                    }
                    if ($('#city').val() <=0){
                        alert('Select City')
                        event.preventDefault();
                    }
                    if ($('#email').val() <=0){
                        alert('Member Profile Email Address Cannot be Empty')
                        event.preventDefault();
                    }
                    if ($('#description').val() <=0){
                        alert('Member Profile Description Cannot be Empty')
                        event.preventDefault();
                    }

                })
            });
        </script>
    </div>
@endsection
