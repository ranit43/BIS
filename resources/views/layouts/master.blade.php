<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="ThemeWagon" />
        <meta name="Description" content="Responsive Multiporpuse HTML5 Website Template">
        <meta name="keywords" content="Business, Agency, Corporate, Flat, Responsive, Website Template">

        <title>BIS</title>

        
        <!-- favicons
        ============================================= -->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-icon-57x57.png">
        <meta name="theme-color" content="#ffffff">

        
        <!-- StyleSheets
        ============================================= -->

        <!-- Twitter Bootstrap -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        
        <!-- Library Stylesheets -->
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700'>
        <link rel="stylesheet" href="/css/animsition.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/ionicons.css">
        <!-- <link rel="stylesheet" href="/css/magnific-popup.css"> -->
        

        <link rel="stylesheet" href="/css/flexslider.css">
        <!-- <link rel="stylesheet" type="text/css" href="assets/lib/owlcarousel/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="assets/lib/owlcarousel/owl-carousel/owl.theme.css">
        <link rel="stylesheet" type="text/css" href="assets/lib/owlcarousel/owl-carousel/owl.transitions.css"> -->

        @yield('stylesheets')


        <!-- Custom Template Styles -->
        <link rel="stylesheet" href="/css/main.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </head>

    <body data-spy="scroll" data-target="#main-nav-collapse" data-offset="100">
        <div id="zwrapper" 
        class="zwrapper animsition" 
        data-animsition-in-class="fade-in"
        data-animsition-in-duration="1000"
        data-animsition-out-class="fade-out"
        data-animsition-out-duration="800"
        data-page-loader-text="california">

            @include('../partials.navbar')


            @yield('content')


        </div><!--/#zwrapper-->

        <footer id="footer" class="section footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <p class="copyright">© 2012 CSE, SUST</p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        {{--<p class="footer-menu">
                            <a href="">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a>
                        </p>--}}
                        {{--<p class="footer-menu" >--}}
                            {{--Co-ordinated By:--}}
                            {{--<br>--}}
                            {{--Md Masum--}}
                            {{--<br>--}}
                            {{--Associate Professor, CSE, SUST--}}
                            {{--<br>--}}
                            {{--Developed By:--}}
                            {{--<br>--}}
                            {{--Ranit Debnath Akash--}}
                            {{--<br>--}}
                            {{--Tanjila Mawla Tania--}}
                            {{--<br>--}}

                        {{--</p>--}}

                    </div>
                </div>
            </div>
        </footer>



        <!-- Offcanvas Elements
        ============================================= -->






        <!-- Javascripts
        ============================================= -->


        <script src="/js/modernizr.js"></script>
        <script src="/js/jquery.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/animsition.min.js"></script>
        <!-- <script src="/js/jquery.magnific-popup.js"></script> -->


        <script src="/js/particles.min.js"></script>

        <script src="/js/jquery.flexslider.js"></script>
        

        <!-- <script src="assets/lib/owlcarousel/owl-carousel/owl.carousel.js"></script> -->
        <script src="/js/jquery.vide.js"></script>

        @yield('scripts')

        <script src="/js/plugins.js"></script>
        <script src="/js/main.js"></script>

    </body>
</html>