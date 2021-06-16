@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Installment Plan {{$installmentPlan->id}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('installmentplans.index')}}">Installment Plan List</a></li>
                            <li class="breadcrumb-item active">Edit Installment Plan {{$installmentPlan->id}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Installment Plan {{$installmentPlan->id}} Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('installmentplans.update',$installmentPlan->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$installmentPlan->name}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" id="code" class="form-control" value="{{$installmentPlan->code}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Booking</label>
                                <input type="number" name="booking" id="booking" class="form-control" step="0.01" value="{{$installmentPlan->booking}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Allocation</label>
                                <input type="number" name="allocation" id="allocation" class="form-control" step="0.01" value="{{$installmentPlan->allocation}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Confirmation</label>
                                <input type="number" name="confirmation" id="confirmation" class="form-control" step="0.01" value="{{$installmentPlan->confirmation}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Plan Duration Months</label>
                                <input type="number" name="months" id="months" class="form-control" step="0.01" value="{{$installmentPlan->months}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Quarterly Installment</label>
                                <input type="number" name="quarterly_installment" id="quarterly_installment" class="form-control" step="0.01" value="{{$installmentPlan->quarterly_installment}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Monthly Installment</label>
                                <input type="number" name="monthly_installment" id="monthly_installment" class="form-control" step="0.01" value="{{$installmentPlan->monthly_installment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mid Year Installment</label>
                                <input type="number" name="midyear_installment" id="midyear_installment" class="form-control" step="0.01" value="{{$installmentPlan->midyear_installment}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Yearly Installment</label>
                                <input type="number" name="yearly_installment" id="yearly_installment" class="form-control" step="0.01" value="{{$installmentPlan->yearly_installment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Possession Charges</label>
                                <input type="number" name="possession" id="possession" class="form-control" step="0.01" value="{{$installmentPlan->possession}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Total</label>
                                <input type="number" name="total" id="total" class="form-control" step="0.01" value="{{$installmentPlan->total}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5">{{$installmentPlan->description}}</textarea>
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
                        alert('Installment Plan Name Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#code').val()=='' ){
                        alert('Installment Plan Code Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#booking').val()==''){
                        alert('Installment Plan Booking Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#allocation').val()==''){
                        alert('Installment Plan Allocation Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#confirmation').val()==''){
                        alert('Installment Plan Confirmation Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#months').val()==''){
                        alert('Installment Plan Duration Months Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#quarterly_installment').val()==''){
                        alert('Installment Plan Quarterly Installment Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#monthly_installment').val()==''){
                        alert('Installment Plan Monthly Installment Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#midyear_installment').val()==''){
                        alert('Installment Plan Mid Year Installment Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#yearly_installment').val()==''){
                        alert('Installment Plan  Yearly  Installment Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#midyear_installment').val()==''){
                        alert('Installment Plan Mid Year Installment Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#Possession').val()==''){
                        alert('Installment Plan Possession Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#Total').val()==''){
                        alert('Installment Plan Total Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#description').val()==''){
                        alert('Installment Plan Description Cannot be Empty')
                        event.preventDefault();
                    }
                    var sum=parseFloat($('#booking').val());
                    sum+=parseFloat($('#allocation').val());
                    sum+=parseFloat($('#confirmation').val());
                    sum+=(parseFloat($('#months').val())*parseFloat($('#monthly_installment').val()));
                    sum+=parseFloat($('#quarterly_installment').val());
                    sum+=parseFloat($('#midyear_installment').val())
                    sum+=parseFloat($('#yearly_installment').val());
                    sum+=parseFloat($('#possession').val());
                    if(parseFloat($('#total').val())!=sum){
                        alert('Installment Plan is Not Equal to Total Kindly check your entries')
                        event.preventDefault();
                    }
                })
            });
        </script>
    </div>
@endsection

