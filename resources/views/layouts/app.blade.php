<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <title>Document</title>
    @stack("header_extras")
</head>


<body>
    @include("layouts.partials.header");
    <div class="topimg">
        <div class="topheader2">
        @yield("content")
        </div>
    </div>
    @include("layouts.partials.footer");
    <script src="{{asset('/js/jquery.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('/js/validate.min.js')}}"></script>
    <script src="{{asset('/js/formvalidate.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {

            window.addEventListener('scroll', function() {

                if (window.scrollY > 200) {
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    // remove padding top from body
                    document.body.style.paddingTop = '0';
                }
            });
        });
        // DOMContentLoaded  end
    </script>

    <script>
        function div(x) {
            if (x == 0)
                document.getElementById('mytext').style.display = 'block';
            else
                document.getElementById('mytext').style.display = 'none';
            return;
        }
    </script>

    @stack("footer_extras")

</body>

</html>
