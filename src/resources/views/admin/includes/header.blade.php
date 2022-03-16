<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="users/index.blade.php">
                        <img src="images/icon/logo.png" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="users/index.blade.php">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="index4.html">Dashboard 4</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.users.index')}}">
                            <i class="fas fa-user-circle"></i>users</a>
                    </li>
                    <li>
                        <a href="{{route('admin.categories.index')}}">
                            <i class="fas fa-list-alt"></i>Categories</a>
                    </li>
                    <li>
                        <a href="{{route('admin.exams.index')}}">
                            <i class="far fa-bars"></i>Exams</a>
                    </li>
                    <li>
                        <a href="{{route('admin.questions.index')}}">
                            <i class="fas fa-question "></i>questions</a>
                    </li>
                    <li>
                        <a href="{{route('admin.results.index')}}">
                            <i class="fa fa-bolt "></i>results</a>
                    </li>
                    <li>
                        <a href="{{route('admin.scores.index')}}">
                            <i class="fas fa-star"></i>scores</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->
