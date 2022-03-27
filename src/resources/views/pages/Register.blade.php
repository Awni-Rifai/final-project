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
                                <span>Sign in</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <div class="container">

                        <div class="card py-5 shadow-lg d-flex justify-content-lg-center align-items-center p-5">
                            <div class="card-body flex-fill w-100">

                                <form method="POST" action="{{route('register')}}" class="signup-form">
                                    @csrf
                                    <div class="form-group mb-3">

                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full Name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">

                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">

                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-3">
                                        <input id="password_confirmation" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="signin" class="form-control btn btn-primary submit px-3">Sign Up</button>
                                    </div>
                                </form>
                                <p class="text-center mt-3">Not a member? <a id="signup" href="">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

@endsection
