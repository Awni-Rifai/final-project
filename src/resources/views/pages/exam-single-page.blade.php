@extends('pages/includes/master')
@section('content')
    <div id="questionContainer"  class="container pt-5 d-flex justify-content-lg-center">
        <div class="card shadow-lg  w-75 m-auto" style="margin: 100px auto !important;" >


            <div class="row p-5 text-center feature-icons aos-init aos-animate" data-aos="fade-up" >
                <h1 class="font-weight-bold"><span class="text-uppercase">{{$exam->name}}</span> Exam</h1>

                <div class="row">

                    <div class="col-xl-4 text-center aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{asset('admin_styles/images/exams/'.$exam->image)}}" class="img-fluid p-4" alt="">
                    </div>

                    <div class="col-xl-8 d-flex content">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-12 icon-box aos-init aos-animate" data-aos="fade-up">

                                <div class="p-3">
                                    <h3>Final Score is <span class="font-weight-bold text-primary">{{$exam->max_score}} point</span></h3>
                                    <p clas="p-2">The exam is from {{$exam->category->name}} category and you have {{$exam->duration}} minutes to finish it please invest your time wisely </p>
                                </div>
                                <button id="next" data-id="{{$exam->id}}" class="btn mt-4 px-5 py-2 btn-primary btn-lg">Start now</button>
                            </div>



                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
