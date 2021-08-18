<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>eClick POS | Coming soon</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <style type="text/css">
            .bg {
              background-image: url({{ asset('assets/images/login.png') }});
              height: 100%;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
        </style>
    </head>

    <body class="bg">
        <img src="{{ asset('assets/images/top.svg') }}" style="position: absolute; top: 0; left: 0; height: 150px">
        <img src="{{ asset('assets/images/bottom.svg') }}" style="position: absolute; bottom: 0; right: 0; height: 200px">
        <!-- Begin page -->
        <div class="ex-pages">
            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="home-wrapper text-center my-4">
                                    <img src="{{ asset('assets/images/logo.svg') }}" alt="logo"  />
                                    <h3 class="m-t-30 m-b-30" style="color: #fff">Coming soon</h3>

                                    <div class="coming-watch text-center mb-5" dir="ltr">
                                        <div class="countdown">
                                            <div>
                                                <div><span>0</span><span>days</span></div>
                                                <div><span>0</span><span>hours</span></div>
                                            </div>
                                            <div class="lj-countdown-ms">
                                                <div><span>0</span><span>minutes</span></div>
                                                <div><span>0</span><span>seconds</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end home wrapper -->
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </div>
            </div>

        </div>
        <!-- end error page -->



        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>

        <!-- countdown -->
        <script src="{{ asset('assets/plugins/countdown/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/pages/countdown.int.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>

</html>