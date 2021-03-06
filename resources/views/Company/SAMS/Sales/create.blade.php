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
            <div class="steps-container mt-4">
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
                    <div id="step1">
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
                                    <input type="text" name="code" class="form-control" id="sale_code">
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
                                    <label>Total Price</label>
                                    <input type="number" name="total_price" class="form-control" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Payment</label>
                                <div class="form-group ml-4">
                                    <input type="radio" name="payment"  value="cash_price" class="form-check-input" >
                                    <label for="payment" class="form-check-label">Cash Price</label>
                                </div>
                                <div class="form-group ml-4">
                                    <input type="radio" name="payment"  value="installment_price" class="form-check-input" >
                                    <label for="payment" class="form-check-label">Installment Price</label>
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

                        <div class="row" >
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <table class="table table-bordered " id="inhensive">

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-info text-white bg-success" value="Next" name="step1">
                            </div>
                        </div>
                    </div>

                    <div id="step2">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Member</label>
                                    <select name="memberprofile_code" id="memberprofile" class="form-control">
                                        <option value="" name="memberprofile_code">Select Member Profile</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nominee</label>
                                    <select name="nominee_code" id="nomineeprofile" class="form-control">
                                        <option value="" name="nominee_code">Select Member Profile First</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <table class="table table-bordered" id="memberdetail">

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <table class="table table-bordered" id="nomineedetail">

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-info text-white bg-success" value="Previous" name="step1">
                                <input type="submit" class="btn btn-info text-white bg-success" value="Next" name="step2">
                            </div>
                        </div>
                    </div>

                    <div id="step3">
                        <div class="row" id="installment">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Installment Plan</label>
                                    <select name="installmentplan_code" id="installmentplan" class="form-control">
                                        <option value="" name="installmentplan_code">Select Installment Plan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Installment Start Date</label>
                                    <input type="date" class="form-control" name="start_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <table class="table table-bordered" id="installmentplandetail">

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-info text-white bg-success" value="Previous" name="step2">
                                <input type="submit" class="btn btn-info text-white bg-success" value="Next" name="step3">
                            </div>
                        </div>
                    </div>

                    <div id="step4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Dealer</label>
                                    <select name="dealerprofile_code" id="dealerprofile" class="form-control">
                                        <option value="" name="dealerprofile_code">Select Member Profile</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Dealer Rebate</label>
                                    <input type="number" name="rebate" class="form-control" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <table class="table table-bordered" id="dealerdetail">

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-info text-white bg-success" value="Previous" name="step3">
                                <input type="submit" class="btn btn-info text-white bg-success" value="Next" name="step4">
                            </div>
                        </div>
                    </div>

                    <div id="step5">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="text-center text-white bg-primary">
                                                <h3>Plot Information</h3>
                                            </th>
                                            <th class="text-center text-white bg-primary">
                                                <h3>Customer Information</h3>
                                            </th>
                                        </tr>

                                        <tr>
                                            <td id="plot_confirmation">

                                            </td>
                                            <td id="customer_confirmation">

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
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
                var plot_change_check=0;
                var inhensivefeature_check='';
                var society_code;
                var plot_id;
                var plot_details;
                var memberProfile_array;
                var memberShip_array;
                var nominee_id;
                var nomineeProfile_array;
                var dealerProfile_array;
                var dealerShip_array;
                //selector
                var _project=$('#project');
                var _society=$('#society');
                var _sector=$('#sector');
                var _block=$('#block');
                var _street=$('#street');
                var _plot=$('#plot');
                var _sale_code=$('#sale_code')
                var _inhensive=$('#inhensive');
                var _description=$('#description');
                var _memberprofile=$('#memberprofile');
                var _memberdetail=$('#memberdetail');
                var _nomineeprofile=$('#nomineeprofile');
                var _nomineedetail=$('#nomineedetail');
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
                            society_code=this.value;
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
                            society_code=_society.val();
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
                            plot_details=data;
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

                _plot.change(function (){
                    plot_change_check=1;
                    plot_id=this.value;
                    $.ajax({
                        url:"{{route('plotdetail.list')}}",
                        type:"POST",
                        data:{
                            plot_code:this.value,
                            _token: '{{csrf_token()}}'
                        },
                        success:function(data){
                            cash_price=data.cash_price;
                            installment_price=data.installment_price;
                            inhensivefeature=data.inhensivefeature;
                            area=data.area;
                            category=data.category;
                            size=data.size;
                            type=data.type;
                            inhensivefeature_check=data.check;
                            iffun();
                            if(payment_check=='cash_price'){
                                cashPrice();
                            }
                            if(payment_check=='installment_price'){
                                installmentPrice();
                            }
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                })

                function iffun() {
                    increment=0;
                    _inhensive.show();
                    _inhensive.empty();
                    _inhensive.append("<tr><td><h5>Plot Area:</h5></td><td>" + area + "</td><td><h5>" +
                        "Plot Category:</h5></td><td>" + category + "</td></tr>");
                    _inhensive.append("<tr><td><h5>Plot Size:</h5></td><td>" + size + "</td><td><h5>" +
                        "Plot Type:</h5></td><td>" + type + "</td></tr>");
                    if( inhensivefeature_check != ''){
                        _inhensive.append("<tr><th colspan='4'><h3>Inhensive Features:</h3></th></tr>");
                        inhensivefeature.forEach(function (inhensiveFeature) {
                            var temp = (selected_price / 100) * inhensiveFeature[0].percentage;
                            increment += temp;
                            if (plot_change_check==1){
                                _inhensive.append("<tr><td colspan='2'><h5>" + inhensiveFeature[0].name + ":</h5></td><td colspan='2'>" + inhensiveFeature[0].percentage + "%</td></tr>");
                                plot_change_check=0;
                            }else{
                                _inhensive.append("<tr><td colspan='2'><h5>" + inhensiveFeature[0].name + ":</h5></td><td colspan='2'>" + temp + "</td></tr>");
                            }
                        })
                    }

                }

                function cashPrice(){
                    discount=Number(_discount.val());
                    extra_charges=Number(_extra_charges.val());
                    selected_price=cash_price;
                    iffun();
                    total_price=0;
                    var total_price=cash_price-discount;
                    total_price+=extra_charges+increment;
                    _total_price.val(total_price);
                }

                function installmentPrice(){
                    discount=Number(_discount.val());
                    extra_charges=Number(_extra_charges.val());
                    selected_price=installment_price;
                    iffun();
                    var total_price=installment_price-discount;
                    total_price+=extra_charges+increment;
                    _total_price.val(total_price);
                }

                _payment.change( function (){
                    if(this.value=='cash_price'){
                        payment_check=this.value;
                        cashPrice();
                    }
                    if(this.value=='installment_price'){
                        payment_check=this.value;
                        installmentPrice();
                    }
                })

                _discount.change(function (){
                    discount=Number(_discount.val());
                    extra_charges=Number(_extra_charges.val());
                    _total_price.val(selected_price-discount+extra_charges+increment);
                })
                _extra_charges.change(function(){
                    discount=Number(_discount.val());
                    extra_charges=Number(_extra_charges.val());
                    _total_price.val(selected_price-discount+extra_charges+increment);
                })

                _step1.click(function (e) {
                    e.preventDefault();
                    /*if (!(_project.val())){
                        alert("Select Project First");
                    }else if (!(_society.val())) {
                        alert("Select Society First");
                    }else if (!(_sector.val())){
                        alert("Select Sector First");
                    }else if (!(_block.val())){
                        alert('Select Block First');
                    }else if (!(_street.val())){
                        alert('Select Street First');
                    }else if (!(_plot.val())){
                        alert('Select Plot First');
                    }else if (!(_sale_code.val())){
                        alert('Enter Sale Code First');
                    }else if (!(_discount.val())){
                        alert('Enter Discount First');
                    }else if (!(_extra_charges.val())){
                        alert('Enter Extra Charges First');
                    }else if (!(_total_price.val())){
                        alert('Enter Total Price First');
                    }else if (!(payment_check)){
                        alert('Select Payment Type First');
                    }else if (!(_description.val())){
                        alert('Enter Description First');
                    }else{*/
                        $('#step1').toggle();
                        $('#step2').toggle();
                        $('#s2').toggleClass('active');
                        $.ajax({
                            url:"{{route('members.list')}}",
                            type:"POST",
                            data:{
                                _token: '{{csrf_token()}}',
                                society_code: society_code
                            },
                            success:function(data){
                                _memberprofile.empty();
                                _memberprofile.append('<option name="memberprofile_code" value="">Select Member Profile</option>');
                                memberProfile_array=data.memberProfiles;
                                memberShip_array=data.memberShips;
                                data.memberProfiles.forEach(function (member){
                                    _memberprofile.append('<option value="'+member.code+'">'+member.name+'</option>');
                                })
                            },
                            error: function (data, textStatus, errorThrown) {
                                console.log(data);
                            },
                        })
                    /*}*/
                })

                _memberprofile.change(function (e){
                    customer_id=this.value;
                    _memberdetail.show();
                    _memberdetail.empty();
                    var temp;
                    memberShip_array.forEach(function (memberShip){
                        if (memberShip.memberprofile_code==customer_id){
                            temp=memberShip.code;
                        }
                    });
                    memberProfile_array.forEach(function (member){
                        if (customer_id==member.code){
                            var src='../storage/memberprofile/'+member.code+'/'+member.picture;
                            _memberdetail.append('<tr><td colspan="4" class="text-center"><h3>Member Details</h3></td></tr>')
                            _memberdetail.append('<tr><td><h5>Name</h5></td><td>'+member.name+'</td><td><h5>Membership Code</h5></td><td>' + temp + '</td></tr>');
                            _memberdetail.append('<tr><td><h5>Image</h5></td><td><img src="'+src+'" height="150px" width="150px"></td><td><h5>CNIC#</h5></td><td>' + member.cnic + '</td></tr>');
                        }
                    })

                    $.ajax({
                        url:"{{route('nominee.list')}}",
                        type:"POST",
                        data:{
                            _token: '{{csrf_token()}}',
                        },
                        success:function(data){
                            _nomineeprofile.empty();
                            _nomineeprofile.append('<option name="memberprofile_code" value="">Select Nominee Profile</option>');
                            nomineeProfile_array=data.memberProfiles;
                            data.memberProfiles.forEach(function (member){
                                if (customer_id!=member.code){
                                    _nomineeprofile.append('<option value="'+member.code+'">'+member.name+'</option>');
                                }
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                })

                _nomineeprofile.change(function (e){
                    nominee_id=this.value;
                    _nomineedetail.show();
                    _nomineedetail.empty();
                    nomineeProfile_array.forEach(function (member){
                        if (nominee_id==member.code){
                            var src='../storage/memberprofile/'+member.code+'/'+member.picture;
                            _nomineedetail.append('<tr><td colspan="4" class="text-center"><h3>Nominee Details</h3></td></tr>')
                            _nomineedetail.append('<tr><td><h5>Name</h5></td><td>'+member.name+'</td><td><h5>Member Profile Code</h5></td><td>' + member.code + '</td></tr>');
                            _nomineedetail.append('<tr><td><h5>Image</h5></td><td><img src="'+src+'" height="150px" width="150px"></td><td><h5>CNIC#</h5></td><td>' + member.cnic + '</td></tr>');
                        }
                    })
                })

                _step2.click(function (e){
                    e.preventDefault();
                    /*if(!(_memberprofile.val())){
                        alert('Select Member Profile First');
                    }else if (!(_nomineeprofile.val())){
                        alert('Select Nominee Profile First');
                    }else{*/
                        $('#step2').toggle();
                        $('#step3').toggle();
                        $('#s3').toggleClass('active');
                    if (payment_check=='installment_price'){
                        $.ajax({
                            url:"{{route('installmentplans.list')}}",
                            type:"POST",
                            data:{
                                _token: '{{csrf_token()}}'
                            },
                            success:function(data){
                                _installment.show();
                                _installmentplan.empty();
                                _installmentplan.append('<option value="">choose installment plan</option>');
                                data.installmentPlan.forEach(function (installmentPlan){
                                    _installmentplan.append('<option value="'+installmentPlan.code+'">'+installmentPlan.name+'</option>');
                                })
                            },
                            error: function (data, textStatus, errorThrown) {
                                console.log(data);
                            },
                        })
                    }
                    else {
                        _installment.hide();
                        _installmentplandetail.empty();
                        _installmentplandetail.append('<tr><td colspan="2"><h5>Total Price</h5></td><td colspan="2">'+_total_price.val()+'</td></tr>');
                    }
                   // }
                });

                _installmentplan.change(function (e){
                    _memberdetail.show();
                    $.ajax({
                        url:"{{route('installmentplans.detail')}}",
                        type:"POST",
                        data:{
                            code:_installmentplan.val(),
                            _token: '{{csrf_token()}}'
                        },
                        success:function(data){
                            _installmentplandetail.empty();
                            data.installmentPlan.forEach(function (installmentPlan){
                                var id=0;
                                var d=new Date();
                                var noqi=installmentPlan.months/3;
                                var nomi=installmentPlan.months/6;
                                var noyi=installmentPlan.months/12;
                                _installmentplandetail.append('<tr><td><h5>Name</h5></td><td>'+installmentPlan.name+'</td><td><h5>Installment Plan Code</h5></td><td>'+installmentPlan.code+'</td></tr>');
                                _installmentplandetail.append('<tr><th><h3>id</h3></th><th colspan="2"><h3>Installment</h3></th><th><h3>Price</h3></th></tr>');
                                _installmentplandetail.append('<tr><td>'+(++id)+'</td><td colspan="2"><h5>Booking</h5></td><td colspan="2">'+((_total_price.val()/100)*installmentPlan.booking)+'</td></tr>');
                                _installmentplandetail.append('<tr><td>'+(++id)+'</td><td colspan="2"><h5>Confirmation</h5></td><td colspan="2">'+((_total_price.val()/100)*installmentPlan.confirmation)+'</td></tr>');
                                for (var x=1; x<=installmentPlan.months; x++){
                                    _installmentplandetail.append('<tr><td>'+(++id)+'</td><td colspan="2"><h5> Monthly Installment '+x+'</h5></td><td colspan="2">'+((_total_price.val()/100)*installmentPlan.monthly_installment)+'</td></tr>')
                                    if(x%3==0 && installmentPlan.quarterly_installment>0){
                                        _installmentplandetail.append('<tr><td>'+(++id)+'</td><td colspan="2"><h5> Quaterly Installment '+x/3+'</h5></td><td colspan="2">'+((_total_price.val()/100)*(installmentPlan.quarterly_installment/noqi))+'</td></tr>')
                                    }
                                    if(x%6==0 && (x/2)/2!=0 && installmentPlan.midyear_installment){
                                        _installmentplandetail.append('<tr><td>'+(++id)+'</td><td colspan="2"><h5> Mid Year Installment '+x/3+'</h5></td><td colspan="2">'+((_total_price.val()/100)*(installmentPlan.midyear_installment/nomi))+'</td></tr>')
                                    }
                                    if(x%12==0 && installmentPlan.yearly_installment){
                                        _installmentplandetail.append('<tr><td>'+(++id)+'</td><td colspan="2"><h5> Yearly Installment '+x/3+'</h5></td><td colspan="2">'+((_total_price.val()/100)*(installmentPlan.yearly_installment/noyi))+'</td></tr>')
                                    }
                                }
                                _installmentplandetail.append('<tr><td>'+(++id)+'</td><td colspan="2"><h5>Allocation</h5></td><td colspan="2">'+((_total_price.val()/100)*installmentPlan.allocation)+'</td></tr>');
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                });

                _step3.click(function (e){
                    e.preventDefault();
                    $('#step3').toggle();
                    $('#step4').toggle();
                    $('#s4').toggleClass('active');

                    $.ajax({
                        url:"{{route('dealers.list')}}",
                        type:"POST",
                        data:{
                            _token: '{{csrf_token()}}',
                            society_code: society_code
                        },
                        success:function(data){
                            _dealerprofile.empty();
                            _dealerprofile.append('<option name="memberprofile_code" value="">Select Dealer Profile</option>');
                            dealerProfile_array=data.dealerProfiles;
                            dealerShip_array=data.dealerShips;
                            data.dealerProfiles.forEach(function (dealer){
                                _dealerprofile.append('<option value="'+dealer.code+'">'+dealer.name+'</option>');
                            })
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                        },
                    })
                })

                _step4.click(function (e){
                    e.preventDefault();
                    $('#step4').toggle();
                    $('#step5').toggle();
                    $('#s5').toggleClass('active');
                    _plot_confirmation.empty();
                    _customer_verification.empty();

                    _plot_confirmation.append('<tr><td colspan="2">Property Name</td><td>'+plot_details.name+'</td></tr>');
                    _plot_confirmation.append('<tr><td colspan="2">Property Area</td><td>'+plot_details.area+'</td></tr>');
                    _plot_confirmation.append('<tr><td colspan="2">Property Category</td><td>'+plot_details.category+'</td></tr>');
                    _plot_confirmation.append('<tr><td colspan="2">Property Size</td><td>'+plot_details.size+'</td></tr>');

                    memberProfile_array.forEach(function (customer){
                        if (_memberprofile.val()==customer.code){
                            _customer_verification.append('<tr><td colspan="2">Customer Name</td><td>'+customer.name+'</td></tr>');
                            _customer_verification.append('<tr><td colspan="2">Father Name</td><td>'+customer.father_name+'</td></tr>');
                            _customer_verification.append('<tr><td colspan="2">Cnic No</td><td>'+customer.cnic+'</td></tr>');
                            _customer_verification.append('<tr><td colspan="2">Address</td><td>'+customer.address+'</td></tr>');
                        }
                    })

                });


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
