<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8" />
        <title>
            @section('title')
                Composer.json Generator
            @show
        </title>
        <meta name="keywords" content="Alys, Faq" />
        <meta name="author" content="Nicolas Widart" />
        <meta name="description" content="FAQ d'alys" />

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS
        ================================================== -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href="{{{ asset('assets/css/vendor/bootplus.css') }}}" rel="stylesheet">
        <link href="{{{ asset('assets/css/vendor/bootplus-responsive.css') }}}" rel="stylesheet">

        <link href="{{{ asset('assets/css/main.css') }}}" rel="stylesheet">

        <style>
        @section('styles')
        @show
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons
        ================================================== -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
    </head>

    <body>
        <!-- To make sticky footer need to wrap in a div -->
        <div id="wrap">
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('/') }}}">Generate</a></li>
                        </ul>
                    </div>
                    <!-- ./ nav-collapse -->
                </div>
            </div>
        </div>
        <!-- ./ navbar -->

        <!-- Container -->
        <div class="container">
            <!-- Notifications -->
            @include('site.layouts.notifications')
            <!-- ./ notifications -->

            <!-- Content -->
            @yield('content')
            <!-- ./ content -->
        </div>
        <!-- ./ container -->

        <!-- the following div is needed to make a sticky footer -->
        <div id="push"></div>
        </div>
        <!-- ./wrap -->


        <div id="footer">
          <div class="container">
            <p class="muted credit">Created by <a href="http://www.nicolaswidart.com" title="Nicolas Widart" alt="Nicolas Widart">Nicolas Widart</a></p>
          </div>
        </div>

        <!-- Javascripts
        ================================================== -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{{ asset('assets/js/vendor/bootstrap.js') }}}"></script>
        <script src="{{{ asset('assets/js/vendor/twitter-bootstrap-hover-dropdown.min.js') }}}"></script>

        <script src="{{{ asset('assets/js/app.js') }}}"></script>
        <script>
            $(document).ready(function() {
            });
        </script>
        @section('scripts')
        @show
    </body>
</html>
