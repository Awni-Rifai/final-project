<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('pages/assets/img/logoquiz.png')}}" class="img-fluid" style="width: 50px" alt="Quizlet" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="">

                    <a href="{{route('admin.')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>


                <li>
                    @if(Illuminate\Support\Facades\Auth::user()->role_id===3)
                    <a href="{{route('admin.users.index')}}">
                        <i class="fas fa-user-circle"></i>users</a>
                </li>
                @endif
                <li>
                    <a href="{{route('admin.categories.index')}}">
                        <i class="fas fa-list-alt"></i>Categories</a>
                </li>
                <li>
                    <a href="{{route('admin.exams.index')}}">
                        <i class="fa fa-bars"></i>Exams</a>
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
                <li><a class="nav-link text-primary font-weight-bold scrollto active" href="{{route('main_page')}}"> <i class="fas fa-home"></i>Home</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
