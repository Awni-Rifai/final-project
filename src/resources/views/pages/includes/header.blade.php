<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{route('home')}}" class="logo d-flex align-items-center">
            <img src="{{asset('pages/assets/img/logoquiz.png')}}" alt="">
            <span>Quizlet</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                @auth
                    <li><a class="" href="{{route('profile')}}">profile</a></li>
                <li><a class="getstarted scrollto" href="{{route('Exams')}}">Exams</a></li>

                <li>     <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button class="btn btn-outline-dark mx-3" type="submit">Logout</button>
                    </form></li>

                @endauth
                @if(Illuminate\Support\Facades\Auth::user())
                @if(Illuminate\Support\Facades\Auth::user()->role_id!==1)
                    <li>
                    <a href="{{route('admin.')}}">
                        <i class="fas fa-user-circle"></i>Dashboard</a>
                    </li>
                @endif
                @endif
                @guest
                    <li><a class="" href="{{route('register')}}">Register</a></li>
                    <li><a class=" " href="{{route('login')}}">login</a></li>


                    @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
