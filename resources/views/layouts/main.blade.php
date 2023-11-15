<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1f21eb1afe.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="menu">
    <div class="menlogo">
        <a href="{{ route('main.index') }}"><h1>ShowHub</h1></a>
    </div>
    <div class="mentext">
        <a href="{{route('movie.index') }}">Movies</a>
        <a href="">Series</a>
        <a href="">Contact</a>
        <a href="">About Us</a>
        <div class="mediamen">
            <div class="mediamen1">
                <h4>menu <i class="fa-solid fa-chevron-down"></i></h4>
            </div>
            <div class="mediamen2">
                <a href="cataloghtml.php">Movies</a>
                <a href="">Series</a>
                <a href="">Contact</a>
                <a href="">About Us</a>
            </div>
        </div>
    </div>
    <div class="meninp">
        <form class="d-flex" action="{{route('search.search')}}">
            <input type="text" class="w-75" name="movie" id="live_search">
            <input class="w-25" type="submit" value="Search">
            {{--            <h2><i class="fa-solid fa-magnifying-glass"></i></h2>--}}
            {{--            <h3 class="dn clear_search"><i class="fa-solid fa-xmark"></i></h3>--}}
        </form>
    </div>
    <div class="mensign @guest w-10 @endguest @auth w-25 @endauth">
        <!--        <div class="accaunt srdftj">-->
        <!--            <div class="acimg">-->
    {{--        <!--                <img {{ asset('src="img') }}/userimg.png" alt="">-->--}}
    <!--            </div>-->
        <!--            <div class="acname">-->
        <!--                <h3>--><?//= $_SESSION['user']['username']?><!--</h3>-->
        <!--            </div>-->
        <!--            <div class="acexit">-->
        <!---->
        <!--            </div>-->
        <!--        </div>-->
        @can('view' , auth()->user())
            <a class="menbtn1a" href="{{route('admin.main.index')}}">
                <button class="menbtn1">Admin</button>
            </a>
        @endcan
        @auth()
            <a class="menbtn1a" href="{{route('personal.main.index')}}">
                <button class="menbtn1">Personal Page</button>
            </a>
            <div class="user_logout">
                <div>
                    <i class="fas fa-regular fa-circle-user no_hover"></i>
                    <span>{{ auth()->user()->name }}</span>
                    <i class="far fa-solid fa-angle-down"></i>
                    <i class="far fa-solid fa-angle-up dn"></i>
                </div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="menbtn1">Logout</button>
                </form>
            </div>
        @endauth
        @guest()
            <a href="{{ route('login') }}">
                <button class="menbtn2">Log in</button>
            </a>
            <a href="{{ route('register') }}">
                <button class="menbtn2">Register</button>
            </a>
        @endguest
    </div>
</div>
<div id="search_res">

</div>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="{{ asset('https://code.jquery.com/jquery-3.6.3.js') }}"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/scriptsignin.js') }}"></script>
<script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/js/script.js') }}"></script>
<script src="{{ asset('public/js/scriptsearch.js') }}"></script>
@yield('custom_js')


</body>
</html>
