@extends('pages/includes/master')
@section('content')
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="padding: 150px 0 !important;">

        <div class="container aos-init aos-animate" data-aos="fade-up">

            <header class="section-header">
                <h2>Exams</h2>
                <p>Check our latest exams</p>
            </header>

            <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
{{--                    <ul id="portfolio-flters">--}}
{{--                        <li data-filter="*" class="filter-active">All</li>--}}
{{--                        <li data-filter=".filter-app" class="">App</li>--}}
{{--                        <li data-filter=".filter-card" class="">Card</li>--}}
{{--                        <li data-filter=".filter-web" class="">Web</li>--}}
{{--                    </ul>--}}
                </div>
            </div>

            <div class="row gy-4 portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 738px;margin-top: 30px!important;">
                @foreach($exams as $exam)
                    <a href="{{route('exam-single',$exam->id)}}" >
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app" >

                            <div class="portfolio-wrap">
                                <img src="{{asset('admin_styles/images/exams/'.$exam->image)}}" class="img-fluid" style="width: {{$exam->name==="css"?"170px":"250px"}} !important;height: 200px" alt="">
                                <div class="portfolio-info">
                                    <h4>{{$exam->name}}</h4>
                                    <p>{{$exam->category->name}}</p>

                                </div>
                            </div>

                        </div>
                    </a>
                @endforeach

            </div>

        </div>

    </section>
@endsection
