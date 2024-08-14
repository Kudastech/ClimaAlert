<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Weather Forecast </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="{{ url('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="../../../stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('front/aos%403.0.0-beta.6/dist/aos.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800&amp;family=Corben&amp;family=Elsie&amp;family=Encode+Sans+Condensed:wght@400;500;600;700;800&amp;family=Gloria+Hallelujah&amp;family=Inter:wght@100;200;300;400;500;700;800;900&amp;family=Kaushan+Script&amp;family=Lobster&amp;family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&amp;family=Montserrat:wght@200;300;400;500;600;700&amp;family=Open+Sans:wght@300;400;500;600;700&amp;family=Quicksand:wght@400;500;600;700&amp;family=Rajdhani:wght@300;400;500;600;700&amp;family=Roboto+Condensed:wght@300;400;700&amp;family=Roboto:wght@300;400;500;700;900&amp;family=Saira+Condensed:wght@300;400;500;600;700&amp;family=Yeseva+One&amp;display=swap"
        rel="stylesheet">


    <link href="{{ url('front/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('front/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('front/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('front/css/owl.theme.default.min.css') }}" />


</head>

<body>


    @include('Front.layout.header')

    @yield('content')

    @include('Front.layout.footer')

    <script src="{{ url('front/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('front/js/jquery.min.js')}}"></script>
    <script src="{{ url('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{ url('front/js/custom.js')}}"></script>
    <script src="{{ url('front/aos%402.3.0/dist/aos.js')}}"></script>

    <script>
        AOS.init({
            offset: 100,
            easing: 'ease',
            delay: 0,
            once: true,
            duration: 800,

        });
    </script>

</body>


</html>
