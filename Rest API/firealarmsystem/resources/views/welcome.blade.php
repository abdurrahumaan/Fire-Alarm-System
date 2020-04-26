<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="../assets/img/kit/pro/apple-icon.png">
        <link rel="icon" href="../assets/img/kit/pro/favicon.png">
        <title>
            {{$title}}
        </title>

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../assets/css/material-kit.min40a0.css?v=2.0.2">
        <link href="../assets/assets-for-demo/demo.css" rel="stylesheet" />
        <link href="../assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />

        <style>
            .cat-discount-wrapper {
                position: absolute;
                top: 5px;
                width: 60px;
                height: 51px;
                margin-left: -6px;
                padding: 8px 5px;
                background: url(../assets/img/discountPic/discount-wrapper2.png) no-repeat;
                z-index: 500;
            }

            .brand-discount-wrapper {
                position: absolute;
                top: 5px;
                width: 60px;
                height: 51px;
                margin-left: -11px;
                padding: 5px;
                background: url(../assets/img/discountPic/discount-wrapper2.png) no-repeat;
                z-index: 500;
            }

            .brand-discount-wrapper .pers {
                color: #ffffff;
                float: left;
                font-size: 1.1em;
                font-weight: 600;
                line-height: 1.2em;
                margin: 0;
                padding: 0;
                width: 100%;
            }

            .div2 {
                background-color: #ffffff;
                border-radius: 5px;
                border: 1px solid #e0e0e0;
            }

            .margintop0p {
                margin-top: 0px;
            }

            .margintop5p {
                margin-top: 5%;
            }

            .margintop10p {
                margin-top: 10%;
            }

            .card_border {
                border: 5px solid #1565c0;
            }

            .paragraph {
                font-weight: 400;
            }
        </style>
    </head>
    <body class="blog-posts sidebar-collapse" style="background-image: url('https://images.pexels.com/photos/103592/pexels-photo-103592.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')">

        <nav class="navbar  fixed-top  navbar-expand-lg " id="sectionsNav">

            <div class="container">
                <div class="navbar-translate">

                    <a class="navbar-brand" href="../index.html">
                        {{$navtitle}}
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">

                        <!-- <li class="dropdown nav-item">
                            <a href="#" class=" nav-link" data-toggle="dropdown" style="font-weight: 600;">
                                Home
                            </a>
                        </li> -->

                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-header" id="databale">
            <div class="container">
                <div class="card">
                    <div class="card-header card-header-danger text-center">
                        <h4>Fire alarm sensor status</h4>
                    </div>
                    <div class="card-body pt-4">
                        <table class="table table-bordered text-dark">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Floor</th>
                                <th>Room</th>
                                <th>Sensor</th>
                                <th>Status</th>
                            </tr>
                            <tbody>
                                @foreach($sensors as $sensorRecord)
                                <tr>
                                    <td>{{$sensorRecord['index']}}</td>
                                    <td>{{$sensorRecord['floor']}}</td>
                                    <td>{{$sensorRecord['room']}}</td>
                                    <td>{{$sensorRecord['sensor']}}</td>
                                    <td class="text-center">
                                        <svg height="30" width="30">
                                            <circle cx="20" cy="20" r="10" stroke="white" stroke-width="3" fill="{{$sensorRecord['status']}}" />
                                          </svg>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



            <script src="../assets/js/core/jquery.min.js "></script>
            <script src="../assets/js/core/popper.min.js "></script>
            <script src="../assets/js/bootstrap-material-design.min.js "></script>
            <!--  Google Maps Plugin  -->
            <script type="text/javascript " src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU "></script>
            <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
            <script src="../assets/js/plugins/moment.min.js "></script>
            <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
            <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js "></script>
            <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
            <script src="../assets/js/plugins/nouislider.min.js "></script>
            <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
            <script src="../assets/js/plugins/bootstrap-selectpicker.js "></script>
            <!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
            <script src="../assets/js/plugins/bootstrap-tagsinput.js "></script>
            <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
            <script src="../assets/js/plugins/jasny-bootstrap.min.js "></script>
            <!--	Plugin for Small Gallery in Product Page -->
            <script src="../assets/js/plugins/jquery.flexisel.js "></script>
            <!-- Plugins for presentation and navigation  -->
            <script src="../assets/assets-for-demo/js/modernizr.js "></script>
            <script src="../assets/assets-for-demo/js/vertical-nav.js "></script>
            <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
            <script src="../assets/js/material-kit.min40a0.js?v=2.0.2 "></script>
            <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
            <script src="../assets/assets-for-demo/js/material-kit-demo.js "></script>

    </body>
</html>
