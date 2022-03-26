<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">

                    <div class="header-button">

                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{asset('admin_styles/images/icon/avatar-06.jpg')}}" alt="{{Illuminate\Support\Facades\Auth::user()->name}}" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{Illuminate\Support\Facades\Auth::user()->name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{asset('admin_styles/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{Illuminate\Support\Facades\Auth::user()->name}}</a>
                                            </h5>
                                            <span class="email">{{Illuminate\Support\Facades\Auth::user()->email}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">

                                    <div class="account-dropdown__footer">
                                        <form id="logout-form mx-auto" action="{{ route('logout') }}" method="POST" >
                                            @csrf
                                            <button class="btn btn-outline-primary mx-auto" type="submit">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER DESKTOP-->
