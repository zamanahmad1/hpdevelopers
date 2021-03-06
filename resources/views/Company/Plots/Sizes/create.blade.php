@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Plot Size </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('plotsizes.index')}}">Plot Size List</a></li>
                            <li class="breadcrumb-item active">Create New Plot Size</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Plot Size Form</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('plotsizes.store') }}">
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
                                <input type="text" name="code" id="code" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Installment Price</label>
                                <input type="number" name="installment_price" id="installment_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Cash Price</label>
                                <input type="number" name="cash_price" id="cash_price" class="form-control">
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
                        alert('Plot Size Name Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#code').val()=='' ){
                        alert('Plot Size Code Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#installment_price').val()=='' ){
                        alert('Plot Size Installment Price Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#cash_price').val()=='' ){
                        alert('Plot Size Cash Price Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#description').val()==''){
                        alert('Plot Size Description Cannot be Empty')
                        event.preventDefault();
                    }
                })
            });
        </script>
    </div>
@endsection
