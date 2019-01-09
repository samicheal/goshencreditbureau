<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Goshen Rate Credit Bureau</title>
    <link href="{{ asset('css/front/bootstrap.min.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('css/front/font-awesome.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('css/front/style.css') }}" rel='stylesheet' type='text/css'/>
    <script src="{{ asset('js/front/jq.js') }}"></script>
</head>
<body class="body">
    <div class="container text-center">
       <h1 class="text-center text-primary header">Goshen Rate Credit Bureau</h1>
       <div class="row">
            <div class="col-md-8 col-md-offset-2 links" style="margin-top: 30px !important;">
                <h3><a href="#" class="link-item hidden" data-option="1">INDIVIDUAL</a></h3>
                <h3><a href="#" class="link-item" data-option="2">COMPANY</a></h3>
            </div>
        </div>
        <div id="login" class="col-md-8 col-md-offset-2" style="margin-top: 30px !important;">
            <form class="row" method="get" action="{{ route('result') }}" data-item="1">
                <p class="error text-left">Enter just the first letter of the firstname name</p>
                <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                    <input type="text" class="form-control clear-input check" name="firstname" placeholder="First Name" required="">
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                    <input type="text" class="form-control clear-input" name="lastname" placeholder="Last Name" required="">
                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <input type="submit" class="btn btn-primary" value="Search">
                </div>
                    
            </form>
            <form class="row hidden" method="get" action="{{ route('companyresult') }}" data-item="2">

                    <div class="col-md-10 col-sm-12 col-xs-12 form-group">
                        <input type="text" class="form-control clear-input" placeholder="Company Name" required="" name="company_name">
                    </div>

                    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                        
                </form>
            <div class="row">
                @if(count($result) == 0)
                    <div class="col-md-12 col-sm-12 col-xs-12 result-body">

                                        <p class="check text-center" style="margin-top:50px;margin-bottom:20px;"><span class="glyphicon glyphicon-envelope"></span></p>

                                        <h4 class="text-center" style="color:green;padding-bottom:50px">{{ $individual }} has no credit record</h4>

                    </div>
                @else
                    <div class="col-md-12 col-sm-12 col-xs-12 result-body">
                        <table class="table" style="margin-top:45px">
                            <tbody>
                                @foreach($result as $result)
                                    <tr class="table-row">
                                        <td class="table-img">
                                        <img src="images/in.jpg" alt=""  style="border-radius:60px"/>
                                        </td>
                                        <td class="table-text">
                                            <h4 class="text-left"> {{$result->firstname}} {{$result->middlename}} {{$result->lastname}}</h4>
                                            <p class="text-left" style="margin-top:0px !important">{{$result->address}}</p>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-xs overlay-item-click" data-overlay="1"
                                            data-name="{{$result->firstname}} {{$result->middlename}} {{$result->lastname}}"
                                            data-owner="{{$result->property_owner}}"
                                            data-judge="{{$result->judge}}"
                                            data-amount="{{$result->amount}}"
                                            data-case="{{$result->case_no}}"
                                            data-address="{{$result->address}}">view details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="overlay-veil"></div>
    <div class="overlay-component col-md-6 col-sm-12 col-xs-12">
        <div class="closeOverlay text-right"><b>close</b></div>
        <div class="ov-content">
            <div class="profile-bottom">
                <div class="profile-bottom-top">
                    <div class="col-md-4 profile-bottom-img">
                        <img class="overlay-image" src="images/pr.jpg" alt="">
                    </div>
                    <div class="col-md-8 profile-text">
                        <h3 id="name">Firstname Lastname</h3>
                        <table class="overlay-table">
                            <tr>
                                <td><b>Property Owner</b></td>
                                <td><b> :</b></td>
                                <td id="owner">info@lorem.com</td>
                            </tr>
                            <tr>
                                <td><b>Case Number</b></td>
                                <td><b> :</b></td>
                                <td id="case">123456</td>
                            </tr>
                            <tr>
                                <td><b>Address</b> </td>
                                <td><b>:</b></td>
                                <td id="address"> United Arab Emirates</td>
                            </tr>
                            <tr>
                                <td><b>Judged By</b></td>
                                <td><b> :</b></td>
                                <td id="judge">123456</td>
                            </tr>
                            <tr>
                                <td><b>Amount</b> </td>
                                <td><b>:</b></td>
                                <td id="amount"> United Arab Emirates</td>
                            </tr>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>   
    </div>    
    <script src="{{ asset('js/front/bootstrap.js') }}"></script>
    <script src="{{ asset('js/front/main2.js') }}"></script>
    <script src="{{ asset('js/front/jquery-ui.min.js') }}"></script>
    <footer class="text-primary footer text-center"><b> &copy; 2018 GoshenTax. All Rights Reserved | Design by <a href="#">SITE Systems</b></a> </footer>
</body>
</html>