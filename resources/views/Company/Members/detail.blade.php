@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Member Profile {{$memberProfile->id}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('memberprofiles.index')}}">Member Profile List</a></li>
                            <li class="breadcrumb-item active">Member Profile {{$memberProfile->id}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="row">
                <div class="col-sm-4">
                    <div class="box box-primary">
                        <div class="box-body box-profile text-center bg-dark">
                            <img class=" img-responsive img-circle mt-5" src="{{asset('storage/memberprofile/'.$memberProfile->code.'/'.$memberProfile->picture)}}" width="150px" height="150px" alt="User profile picture">
                            <h2 class="profile-username text-uppercase text-white mt-5 pb-4">{{$memberProfile->name}}</h2>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Member Profile Code</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->code}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Father Name</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->father_name}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">CNIC</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->cnic}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">CNIC Front Picture</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3"><img class=" img-responsive " src="{{asset('storage/memberprofile/'.$memberProfile->code.'/'.$memberProfile->cnic_front)}}" width="240px" height="160px" alt="cnic front picture"></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">CNIC</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3"><img class=" img-responsive " src="{{asset('storage/memberprofile/'.$memberProfile->code.'/'.$memberProfile->cnic_back)}}" width="240px" height="160px" alt="cnic front picture"></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Date of Birth</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->dob}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Address</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->address}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">CNIC Issuance</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->cnic_issuance}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">CNIC Expiry</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->cnic_expiry}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Email</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->email}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Mobile Number</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->mobile_no}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Resedential Number</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->resedential_no}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Notification Number</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$memberProfile->notification_no}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Country</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$country->name}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">Province</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$province->name}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-uppercase text-gray text-left">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b class="pl-3">City</b>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a class="pr-3">{{$city->name}}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
