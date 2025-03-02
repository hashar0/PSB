<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/image/PSB.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    {{-- bootstrap --}}

    <link rel="stylesheet" href="{{asset('js/bootstrap.bundle.min.js')}}">
    {{-- css --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    {{-- bootstrap --}}

    {{-- <link rel="stylesheet" href="{{asset('js/bootstrap.bundle.min.js')}}"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- fount --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- css --}}
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    {{-- owl css --}}
    <link rel="stylesheet" href="{{asset('owl_carousal/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('owl_carousal/css/owl.theme.default.min.css')}}">
    {{-- owl js --}}
    <script src="{{asset('owl_carousal/js/jquery.min.js')}}"></script>
    <script src="{{asset('owl_carousal/js/owl.carousel.min.js')}}"></script>
    {{-- country --}}
    <meta name="_token" content="{{ csrf_token() }}">
    {{-- files of navbar minimiam --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    {{-- icon --}}
    <style>
        .custom-spacing {
            margin-left: 140px;
            /* You can adjust this value as needed */
        }

    </style>

</head>
<title>Pets Stock Bazaar</title>
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container">
            <a class="navbar-brand mx-auto" href="/">Pets Stock Bazaar</a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about"><i class="fa-solid fa-address-card"></i> About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contant"><i class="fa-solid fa-phone-volume"></i> Contact Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="wishlist"><i class="fa fa-heart"
                                style="font-size:18px; color: red;"></i> Wishlist

                            </a>
                    </li>


                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i>
                            {{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-registered"></i>
                            {{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                    <li>
                        @if (Auth::user()->profile_image)
                        <img src="{{asset('uploads/profile/'.Auth::user()->profile_image)}}"
                            class="rounded-circle shadow-6-strong" width="40px" height="40px" alt="Image">
                        @else
                        <img src="{{asset("uploads/profile/admin.png")}}" class="rounded-circle shadow-4-strong"
                            width="40px" height="40px" id="image_preview_container" alt="Image">
                        @endif
                    </li>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}

                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('profile')}}"><i class="fa-solid fa-user"></i>My
                            Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i
                                class="fa-solid fa-right-from-bracket"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </li>
                    @endguest



                </ul>



            </div>
        </div>

    </nav>

    {{-- all content --}}
    <div>
        @yield('content')
    </div>

    {{-- footer --}}

    <footer class="footer  bg-dark">
        <div class="container text-white p-4">
            <div class="row">
                <div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-6 float-left">



                        <div class="p-2 font-weight-light">
                            @foreach ($about as $us)
                            <h3> <label class="text-primary"><b>{{$us->name}}</label></h3>
                            <p>{{$us->paragraph}} </p>
                            @endforeach
                        </div>
                        <ul class="font-weight-light">
                            @foreach ($contants as $contant)
                            <span><i class="fa-solid fa-location-dot"></i>&nbsp;{{$contant->location}}</span>
                            <br>
                            <span><i class="fa-solid fa-phone-volume"></i>&nbsp;{{$contant->phone}}</span>
                            <br>
                            <span><a href="#"><i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                    {{$contant->email}}</a></span>
                            @endforeach

                        </ul>

                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
                        <div class="adi-footercolumn adi-widget widget_nav_menu adi-widget">
                            <div>
                                <h3>Quick Links</h3>
                            </div>
                            <div class="menu-footer-top-container">
                                <ul id="menu-footer-top">
                                    <a href="{{route('/')}}"><i class="fa-solid fa-house"></i><label>Home</label></a>
                                    <br>
                                    <a href="{{route('about')}}"><i class="fa-sharp fa-solid fa-code"></i><label>About
                                            Us</label></a>
                                    <br>
                                    <a href="{{route('contant')}}"><i
                                            class="fa-solid fa-phone-volume"></i><label>Contact Us</label></a>
                                    <br>
                                    <a href="{{route('register')}}"><i class="fa-sharp fa-solid fa-eye"></i><label>Show
                                            all</label></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-2 float-left">
                        <div>
                            <div>
                                <h3>Follow Us</h3>
                            </div>
                            <div>

                                <ul>
                                    @foreach ($footers as $footer)
                                    <span> <a href="{{$footer->link}}"><img src="{{$footer->icon}}" alt="footer icon"
                                                class="rounded float-left" style="width: 25px ; height:25px">
                                            <label> {{$footer->name}}<label></a></span>
                                    <br>

                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>


</body>

</html>
