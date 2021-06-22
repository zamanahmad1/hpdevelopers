@extends('layouts.master')
@section('content')
    <style>
        .steps li .step, .steps li.complete .step:before {
            line-height: 30px;
            background-color: #FFF;
            text-align: center;
        }
        .steps {
            list-style: none;
            display: table;
            width: 100%;
            padding: 0;
            margin: 0;
            position: relative
        }
        .steps li {
            display: table-cell;
            text-align: center;
            width: 1%
        }
        .steps li .step {
            border: 5px solid #ced1d6;
            color: #546474;
            font-size: 15px;
            border-radius: 100%;
            position: relative;
            z-index: 2;
            display: inline-block;
            width: 40px;
            height: 40px
        }
        .steps li:before {
            display: block;
            content: "";
            width: 100%;
            height: 1px;
            font-size: 0;
            overflow: hidden;
            border-top: 4px solid #CED1D6;
            position: relative;
            top: 21px;
            z-index: 1
        }
        .steps li.last-child:before {
            max-width: 50%;
            width: 50%
        }
        .steps li:last-child:before {
            max-width: 50%;
            width: 50%
        }
        .steps li:first-child:before {
            max-width: 51%;
            left: 50%
        }
        .steps li.active .step, .steps li.active:before, .steps li.complete .step, .steps li.complete:before {
            border-color: #5293c4
        }
        .steps li.complete .step {
            cursor: default;
            color: #FFF;
            -webkit-transition: transform ease .1s;
            -o-transition: transform ease .1s;
            transition: transform ease .1s
        }
        .steps li.complete .step:before {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            border-radius: 100%;
            content: "\f00c";
            z-index: 3;
            font-family: FontAwesome;
            font-size: 17px;
            color: #87ba21
        }
        .step-content, .tree {
            position: relative
        }
        .steps li.complete:hover .step {
            -moz-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            -o-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
            border-color: #80afd4
        }
        .steps li.complete:hover:before {
            border-color: #80afd4
        }
        .steps li .title {
            display: block;
            margin-top: 4px;
            max-width: 100%;
            color: #949ea7;
            font-size: 14px;
            z-index: 104;
            text-align: center;
            table-layout: fixed;
            word-wrap: break-word
        }
        .steps li.active .title, .steps li.complete .title {
            color: #2b3d53
        }
        .step-content .step-pane {
            display: none;
            min-height: 200px;
            padding: 4px 8px 12px
        }
        .step-content .step-pane.active {
            display: block
        }
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Sale Registration </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('projects.index')}}">Project List</a></li>
                            <li class="breadcrumb-item active">Create Sale Registration</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Sale Registration Form</h3>
            </div>
            <div class="steps-container">
                <ul class="steps">
                    <li data-step="1" id="s1" class="active"> <span class="step">1</span> <span class="title">Details of Plot</span> </li>
                    <li data-step="2" id="s2"> <span class="step">2</span> <span class="title">Member Details</span> </li>
                    <li data-step="3" id="s3"> <span class="step">3</span> <span class="title">Payment/Installment Details</span> </li>
                    <li data-step="4" id="s4"> <span class="step">4</span> <span class="title">Other Details</span> </li>
                    <li data-step="5" id="s5"> <span class="step">5</span> <span class="title">Allotment</span> </li>
                </ul>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Project</label>
                                <select name="project_code" id="project" class="form-control">
                                    <option value="" name="project_code">Select Project</option>
                                    @foreach($project as $p)
                                        <option value="{{$p->code}}">{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Society</label>
                                <select name="society_code" id="society" class="form-control">
                                    <option value="" name="society_code">Select Project First</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sector</label>
                                <select name="sector_code" id="sector" class="form-control">
                                    <option value="" name="sector_code">Select Society First</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Block</label>
                                <select name="block_code" id="block" class="form-control">
                                    <option value="" name="block_code">Select Sector First</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Street</label>
                                <select name="street_code" id="street" class="form-control">
                                    <option value="" name="street_code">Select Block First</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Plot</label>
                                <select name="plot_code" id="plot" class="form-control">
                                    <option value="" name="plot_code">Select Street First</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sale Code</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="number" name="discount" class="form-control" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Extra Charges</label>
                                <input type="number" name="extra_charges" class="form-control" step="0.01">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <label>Total Price</label>
                                    <input type="number" name="total_price" class="form-control" step="0.01">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Payment</label>
                            <div class="form-group">
                                <input type="radio" name="payment"  value="cash_price" class="form-check-input">
                                <label for="payment" class="form-check-label">Cash Price</label>
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
                $('#step2').toggle();
                $('#step3').toggle();
                $('#step4').toggle();
                $('#step5').toggle();
                $('#memberdetail').toggle();
                //values
                var discount=0;
                var extra_charges=0;
                var cash_price=0;
                var installment_price=0;
                var selected_price=0;
                var inhensivefeature;
                var area;
                var category;
                var size;
                var type;
                var increment=0;
                var payment_check;
                var customer_id;
                var plot_id;
                //selector
                var _project=$('#project');
                var _society=$('#society');
                var _sector=$('#sector');
                var _block=$('#block');
                var _street=$('#street');
                var _plot=$('#plot');
                var _inhensive=$('#inhensive');
                var _memberprofile=$('#memberprofile');
                var _memberdetail=$('#memberdetail');
                var _installmentplan=$('#installmentplan');
                var _installmentplandetail=$('#installmentplandetail');
                var _installment=$('#installment');
                var _start_date=$('#start_date')
                var _dealerprofile=$('#dealerprofile');
                var _dealerdetail=$('#dealerdetail');
                var _plot_confirmation=$('#plot_confirmation');
                var _customer_verification=$('#customer_confrimation')
                _inhensive.toggle();

                var _payment=$("input[name='payment']");
                var _discount=$("input[type='number'][name='discount']");
                var _extra_charges=$("input[type='number'][name='extra_charges']");
                var _total_price=$("input[name='total_price']");
                var _step1=$("input[name='step1']");
                var _step2=$("input[name='step2']");
                var _step3=$("input[name='step3']");
                var _step4=$("input[name='step4']");
                var _step5=$("input[name='step5']");

                _project.change(function (){
                    $.ajax({
                        url: "{{route('societies.list')}}",
                        type: "POST",
                        data: {
                            project_code: this.value,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            _society.empty();
                            _society.append('<option value="">choose society</option>');
                            data.societies.forEach(function (society){
                                _society.append('<option value="'+society.code+'">'+society.name+'</option>');
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                })

                _society.change(function (){
                    $.ajax({
                        url: "{{route('sectors.list')}}",
                        type: "POST",
                        data: {
                            society_code: this.value,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            _sector.empty();
                            _sector.append('<option value="">choose sector</option>');
                            data.sectors.forEach(function (sector){
                                _sector.append('<option value="'+sector.code+'">'+sector.name+'</option>');
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                })

                _sector.change(function (){
                    $.ajax({
                        url: "{{route('blocks.list')}}",
                        type: "POST",
                        data: {
                            sector_code: this.value,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            _block.empty();
                            _block.append('<option value="">choose block</option>');
                            data.blocks.forEach(function (block){
                                _block.append('<option value="'+block.code+'">'+block.name+'</option>');
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                })

                _block.change(function (){
                    $.ajax({
                        url: "{{route('streets.list')}}",
                        type: "POST",
                        data: {
                            block_code: this.value,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            _street.empty();
                            _street.append('<option value="">choose street</option>');
                            data.streets.forEach(function (street){
                                _street.append('<option value="'+street.code+'">'+street.name+'</option>');
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                })

                _street.change(function (){
                    $.ajax({
                        url: "{{route('plotinventories.list')}}",
                        type: "POST",
                        data: {
                            street_code: this.value,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {
                            _plot.empty();
                            _plot.append('<option name="plot_code" value="">choose plot</option>');
                            data.plots.forEach(function (plot){
                                _plot.append('<option value="'+plot.code+'">'+plot.name+'</option>');
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                })


                $('#save').click(function (event){
                    if ($('#name').val()=='' ){
                        alert('Project Name Cannot be Empty')
                        event.preventDefault();
                    }
                    if($('#code').val()=='' ){
                        alert('Project Code Cannot be Empty')
                        event.preventDefault();
                    }
                    if( $('#description').val()==''){
                        alert('Project Description Cannot be Empty')
                        event.preventDefault();
                    }
                })
            });
        </script>
    </div>
@endsection
