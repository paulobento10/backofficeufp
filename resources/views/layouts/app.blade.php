<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','BackOffice-UFP')}}</title>

        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

        <link rel="stylesheet" href="public/css/bootstrap.css">
        <link rel="stylesheet" href="public/css/animate.css">
        <link rel="stylesheet" href="public/css/owl.carousel.min.css">

        <link rel="stylesheet" href="public/fonts/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="public/fonts/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="public/css/magnific-popup.css">

        <!-- Theme Style -->
        <link rel="stylesheet" href="public/css/style.css">
        
        <script>
          if ('serviceWorker' in navigator ) {
                window.addEventListener('load', function() {
                    navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                        // Registration was successful
                        console.log('ServiceWorker registration successful with scope: ', registration.scope);
                    }, function(err) {
                        // registration failed :(
                        console.log('ServiceWorker registration failed: ', err);
                    });
                });
            }
        </script>
    </head>
    <body>
        @yield('content')
    </body>
    <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/jquery-migrate-3.0.0.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/jquery.waypoints.min.js"></script>
    <script src="public/js/jquery.stellar.min.js"></script>
    <script src="public/js/jquery.animateNumber.min.js"></script>
    
    <script src="public/js/jquery.magnific-popup.min.js"></script>

    <script src="public/js/main.js"></script>
</html>
