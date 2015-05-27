<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="{{ URL::to('/') }}/" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{$constval['web_title']}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- CSS
================================================== -->
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="frontend/css/bootstrap.css" />
        <link rel="stylesheet" href="frontend/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="frontend/css/prettyPhoto.css" />
        <!--<link rel="stylesheet" href="frontend/css/jquery.lightbox-0.5.css" />-->
        <link rel="stylesheet" href="frontend/css/custom-styles.css" />

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <link rel="stylesheet" href="frontend/css/style-ie.css"/>
        <![endif]--> 

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="frontend/img/favicon.ico" />
        <link rel="apple-touch-icon" href="frontend/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="frontend/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="frontend/img/apple-touch-icon-114x114.png" />
        
        @yield('styles')
    </head>

    <body class="nothome">
        <div class="color-bar-1"></div>
        <div class="color-bar-2 color-bg"></div>

        <div class="container main-container">

            @include('front.partials.header')<!-- End Header -->            

            <!-- Page Content
            ================================================== --> 
            @yield('content')

        </div> <!-- End Container -->
        <div class="clearfix" ></div>
        <br/>
        <!-- Footer Area
            ================================================== -->
        @include('front.partials.footer')


        <!-- Scroll to Top -->  
        <div id="toTop" class="hidden-phone hidden-tablet">Back to Top</div>

        <!-- JS
================================================== -->
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="frontend/js/bootstrap.js"></script>
        <script src="frontend/js/jquery.prettyPhoto.js"></script>
        <script src="frontend/js/jquery.custom.js"></script>
        
        <script>
            $(document).ready(function(){
                $('#menuKategori').click(function(){
                   location.href = $(this).attr('href');
                });
            })
        </script>
        
        @yield('scripts')

    </body>
</html>
