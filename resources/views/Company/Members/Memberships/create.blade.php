@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Membership </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('memberships.index')}}">Membership List</a></li>
                            <li class="breadcrumb-item active">Create New Membership</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Membership Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('memberships.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Society</label>
                                <select name="society_code" id="society" class="form-control">
                                    <option value="" name="society_code">Select Society</option>
                                    @foreach($society as $s)
                                        <option value="{{$s->code}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Member</label>
                                <select name="memberprofile" id="memberprofile" class="form-control">
                                    <option value="" name="memberprofile">Select Society First</option>
                                </select>
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

                $('#society').change(function (){
                    $.ajax({
                        url: "{{route('memberprofiles.list')}}",
                        type: "POST",
                        data:{
                            society_code:this.value,
                            _token: "{{csrf_token()}}"
                        },
                        success: function (data){
                            $('#memberprofile').empty();
                            $('#memberprofile').append('<option value="">Chose Member Profile</option>');
                            data.memberProfiles.forEach(function (memberProfile){
                                $('#memberprofile').append('<option value="'+memberProfile.code+'">'+memberProfile.name+'</option>');
                            });
                        }
                    });
                });

                $('#save').click(function (event){
                    if ($('#name').val()=='' ){
                        alert('Membership Name Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#code').val()=='' ){
                        alert('Membership Code Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#society').val()==''){
                        alert('Select Society')
                        event.preventDefault();
                    }
                    if( $('#description').val()==''){
                        alert('Membership Description Cannot be Empty')
                        event.preventDefault();
                    }

                })
            });
        </script>
    </div>
@endsection
