@extends('pages/includes/master')



  <!-- ======= Hero Section ======= -->
  @section('content')
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">We offer multiple exams in different categories</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Find and create free gamified quizzes and interactive lessons to engage any learner</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{asset('pages/assets/img/hero-img.png')}}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about">

          <div class="container" data-aos="fade-up">
              <div class="row gx-0">

                  <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                      <div class="content">
                          <h3>Who We Are</h3>
                          <h2>We help students pass their exams by simulating a real-life envoiroment for a exam</h2>
                          <p>
                              Conditional logic lets you ask the right follow-up questions and skip the rest. Surveys feel less like interrogations, and more like conversations.
                          </p>
                          <a href="{{route('register')}}">Register to start</a>

                      </div>
                  </div>

                  <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                      <img src="{{asset('pages/assets/img/about.jpg')}}" class="img-fluid" alt="">
                  </div>

              </div>
          </div>

      </section><!-- End About Section -->

      <!-- ======= Values Section ======= -->
      <section id="values" class="values">

          <div class="container" data-aos="fade-up">

              <header class="section-header">
                  <h2>Our Values</h2>
                  <p>Leading with our guiding principles</p>
              </header>

              <div class="row">

                  <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                      <div class="box">
                          <img src="{{asset('pages/assets/img/values-1.png')}}" class="img-fluid" alt="">
                          <h3>We commit to our craft.</h3>
                          <p>Our work has the power to change lives. That’s why we strive to learn continuously and excel at what we do.</p>
                      </div>
                  </div>

                  <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                      <div class="box">
                          <img src="{{asset('pages/assets/img/values-2.png')}}" class="img-fluid" alt="">
                          <h3>We embrace differences</h3>
                          <p>Diverse teams are stronger, and inclusive cultures are more resilient. When we seek out different perspectives, we make better decisions and build better products.</p>
                      </div>
                  </div>

                  <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                      <div class="box">
                          <img src="{{asset('pages/assets/img/values-3.png')}}" class="img-fluid" alt="">
                          <h3>We lead with optimism</h3>
                          <p>We believe in our mission, and we believe in each other. We see the world as it is, set ambitious goals, and inspire one another with generosity of spirit. Together, we reimagine what is possible.</p>
                      </div>
                  </div>

              </div>

          </div>

      </section><!-- End Values Section -->



      <!-- ======= Features Section ======= -->
      <section id="features" class="features">

          <div class="container" data-aos="fade-up">

              <header class="section-header">
                  <h2>Features</h2>
                  <p>Manage Your School exams with Quizlet All-In-One Solution</p>
              </header>

              <div class="row">

                  <div class="col-lg-6">
                      <img src="{{asset('pages/assets/img/features.png')}}" class="img-fluid" alt="">
                  </div>

                  <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                      <div class="row align-self-center gy-4">

                          <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                              <div class="feature-box d-flex align-items-center">
                                  <i class="bi bi-check"></i>
                                  <h3>Smart Course Control</h3>
                              </div>
                          </div>

                          <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                              <div class="feature-box d-flex align-items-center">
                                  <i class="bi bi-check"></i>
                                  <h3>smart exam system</h3>
                              </div>
                          </div>

                          <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                              <div class="feature-box d-flex align-items-center">
                                  <i class="bi bi-check"></i>
                                  <h3>School Management</h3>
                              </div>
                          </div>

                          <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                              <div class="feature-box d-flex align-items-center">
                                  <i class="bi bi-check"></i>
                                  <h3>Live Feeds</h3>
                              </div>
                          </div>


                      </div>
                  </div>

              </div> <!-- / row -->


          </div>

      </section><!-- End Features Section -->

      <!-- ======= Services Section ======= -->


  </main><!-- End #main -->


  @endsection


