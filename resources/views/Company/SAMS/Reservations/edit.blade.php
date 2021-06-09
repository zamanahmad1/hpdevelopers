@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Reservation</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('reservations.index')}}">Reservation List</a></li>
                            <li class="breadcrumb-item active">Edit Reservation</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Reservation Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('reservations.update',$reservation) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Plot</label>
                                <select name="plot_code" id="plot" class="form-control">
                                    <option value="" name="plot_code">Select Plot</option>
                                    @foreach($plotInventory as $pi)
                                        <option value="{{$pi->code}}" @if($reservation->plot_code==$pi->code) SELECTED @endif>{{$pi->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Member Profile</label>
                                <select name="memberprofile_code" id="memberprofile" class="form-control">
                                    <option value="" name="memberprofile_code">Select Member Profile</option>
                                    @foreach($memberProfile as $mp)
                                        <option value="{{$mp->code}}" @if($reservation->memberprofile_code==$mp->code) SELECTED @endif>{{$mp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Reserved Till Date</label>
                                <input type="date" name="reserved_till" id="reserved_till" class="form-control" value="{{$reservation->reserved_till}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Reservation Status</label>
                                <select name="reservation_status" id="reservationstatus" class="form-control">
                                    <option value="" name="reservation_status">Select Reservation Status</option>
                                    @foreach($reservationStatus as $rs)
                                        <option value="{{$rs->code}}" @if($reservation->reservation_status==$rs->code) SELECTED @endif>{{$rs->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="data">
                        <div class="col-sm-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5">{{$reservation->description}}</textarea>
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
                $('#data').hide();
                $('#memberprofile').change(function (event){
                    $.ajax({
                        url:"{{route('memberprofiledetails')}}",
                        type:"POST",
                        data:{
                            code:$('#memberprofile').val(),
                            _token:'{{csrf_token()}}'
                        },
                        success:function (data){
                            data.memberProfile.forEach(function (member){
                                var src='../storage/memberprofile/'+member.code+'/'+member.picture;
                                $('#data').show();
                                $('#data').empty();
                                $('#data').append('<div class="col-sm-6"><div class="form-group"><label>Member Profile Picture</label><br><img src="'+src+'" height="150px" width="150px" alt=""></div></div>');
                                $('#data').append('<div class="col-sm-6"><div class="form-group"><label>CNIC</label><h6>'+member.cnic+'</h6></div></div>');
                            });

                        },
                        error:function (data, textStatus, errorThrown){
                            console.log(data);
                        },
                    })
                })

                $('#save').click(function (event){
                    if( $('#plot').val()==''){
                        alert('Kindly Select Plot First')
                        event.preventDefault();
                    }
                    if($('#memberprofile').val()=='' ){
                        alert('Kindly Select Member Profile First')
                        event.preventDefault();
                    }
                    if( $('#reserved_till').val()==''){
                        alert('Reservation Till Date Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#reservationstatus').val()==''){
                        alert('Kindly Select Reservation Status')
                        event.preventDefault();
                    }
                    if( $('#description').val()==''){
                        alert('Reservation Description Cannot be Empty')
                        event.preventDefault();
                    }
                })
            });
        </script>
    </div>
@endsection
