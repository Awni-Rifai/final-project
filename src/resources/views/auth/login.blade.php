@extends('pages/includes/master')
@section('content')
    <section id="hero" class="hero d-flex align-items-center justify-content-lg-between" >

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Sign up or Sign in</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">We have multiple quizes for you to choose from</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Sign up</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <div class="container">

                        <div class="card py-5 shadow-lg d-flex justify-content-lg-center align-items-center p-5">
                            <div class="card-body flex-fill w-100">

                                <form method="POST" action="{{route('login')}}" class="signin-form">
                                    @csrf
                                    <div class="form-group  mb-3 mx-auto">

                                        <input  id="ground11" placeholder="Email"  type="email" class="mx-auto w-75 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">

                                        <input type="password" id="ground22" placeholder="Password" required   class="mx-auto w-75 form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button id="signin" type="submit" class="mx-auto form-control w-75 d-block text-left btn btn-primary rounded submit px-3">Sign In</button>
                                    </div>
                                    <div class="form-group d-md-flex mb-3">
                                        <div class="w-100 text-center">
                                            <label class="checkbox-wrap checkbox-primary mb-0" id="remember">Remember Me
                                                <input type="checkbox" checked name="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        {{--                                        <div class="w-50 text-md-right">--}}
                                        {{--                                            @if (Route::has('password.request'))--}}
                                        {{--                                                <a href="{{ route('password.request') }}">Forgot Password</a>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </form>
                                <p class="text-center mt-3">Not a member? <a id="signup" href="{{route('register')}}">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

@endsection
