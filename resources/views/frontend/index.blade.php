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
<body>
    <div class="container text-center">
        <h1 class="text-center text-primary header">Goshen Rate Credit Bureau</h1>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 links" style="margin-top: 60px !important;">
                <h3><a href="#" class="link-item" data-option="1">INDIVIDUAL</a></h3>
                <h3><a href="#" class="link-item" data-option="2">COMPANY</a></h3>
            </div>
        </div>
        <div class="row">
            <div id="login" class="col-md-8 col-md-offset-2" style="margin-top: 60px !important;">
                <form class="row hidden" method="get" action="{{ route('result') }}" data-item="1">
                    <p class="error text-left">Enter just the first letter of the firstname name</p>
                    <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                        <input type="text" class="form-control clear-input check" placeholder="First Name" required="" name="firstname">
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                        <input type="text" class="form-control clear-input" placeholder="Last Name" required="" name="lastname">
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
            </div>
        </div>
    </div>    
    <script src="{{ asset('js/front/bootstrap.js') }}"></script>
    <script src="{{ asset('js/front/main.js') }}"></script>
    <footer class="text-primary footer text-center"> &copy; 2018 GoshenTax. All Rights Reserved | Design by <a href="#">SITE Systems</a> </footer>
</body>
</html>