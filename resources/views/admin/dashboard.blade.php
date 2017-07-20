@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row col-md-offset-1">
                <div class=" col-md-3 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Admin's <br> number</p>
                            <h3 class="title"><small style="margin-left: 20px">{{count($admins)}}</small></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="purple">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="card-content">
                            <p class="category">User's </br> number </p>
                            <h3 class="title"><small style="margin-left: 20px">{{count($users)}}</small></h3>
                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header facebook">
                            <i class="fa fa-facebook-square"></i>
                        </div>
                        <div class="card-content">
                            <p class="category">Facebook <br> Users</p>
                            <h3 class="title"><small style="margin-left: 20px">{{count($facebook_users)}}</small></h3>
                        </div>
                    </div>
                </div>

                <div class=" col-md-3 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header google" >
                            <i class="fa fa-google-plus-square"></i>
                        </div>
                        <div class="card-content">
                            <p class="category">Google <br> Users</p>
                            <h3 class="title"><small style="margin-left: 20px">{{count($google_users)}}</small></h3>
                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header paypal" >
                            <i class="fa fa-paypal"></i>
                        </div>
                        <div class="card-content">
                            <p class="category">Paypal Users</p>
                            <h3 class="title"><small style="margin-left: 20px">{{count($paypal_users)}}</small></h3>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

    <style>
        .paypal{
            background-color: darkblue !important;
            color: white;
        }
        .facebook{
            background-color: blue !important;
            color: white;
        }
        .google{
            background-color: orangered !important;
            color: white;
        }


    </style>
@endsection



@section('js')
    <!--  Charts Plugin -->
    <script src="{{asset('js/chartist.min.js')}}"></script>
    <script src="{{asset('js/chartist.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
