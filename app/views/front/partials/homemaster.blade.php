<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="{{ URL::to('/') }}/" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{$constval['web_title']}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- CSS
        ================================================== -->
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="frontend/css/bootstrap.css"/>
        <link rel="stylesheet" href="frontend/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="frontend/css/prettyPhoto.css" />
        <link rel="stylesheet" href="frontend/css/flexslider.css" />
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

        @yield('sctyles')

    </head>

    <body class="home">
        <!-- Color Bars (above header)-->
        <div class="color-bar-1"></div>
        <div class="color-bar-2 color-bg"></div>

        <div class="container">

            @include('front.partials.header')<!-- End Header -->

            @yield('content')

        </div> <!-- End Container -->

        <!-- Footer Area
            ================================================== -->
        @include('front.partials.footer')

        <!-- Scroll to Top -->  
        <div id="toTop" class="hidden-phone hidden-tablet">Back to Top</div>

        <!-- JS
    ================================================== -->
        <script src="frontend/js/jquery-1.8.3.min.js"></script>
        <script src="frontend/js/bootstrap.js"></script>
        <script src="frontend/js/jquery.prettyPhoto.js"></script>
        <script src="frontend/js/jquery.flexslider.js"></script>
        <script src="frontend/js/jquery.custom.js"></script>
        <script type="text/javascript">
            $(document).ready(function (e) {

                $("#btn-blog-next").click(function () {
                    $('#blogCarousel').carousel('next');
                });
                $("#btn-blog-prev").click(function () {
                    $('#blogCarousel').carousel('prev');
                });

                $("#btn-client-next").click(function () {
                    $('#clientCarousel').carousel('next');
                });
                $("#btn-client-prev").click(function () {
                    $('#clientCarousel').carousel('prev');
                });                
                $('#menuKategori').click(function(){
                   location.href = $(this).attr('href');
                });

            });

            $(window).load(function () {

                $('.flexslider').flexslider({
                    animation: "slide",
                    slideshow: true,
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
        @yield('scripts')
    </body>
</html>
