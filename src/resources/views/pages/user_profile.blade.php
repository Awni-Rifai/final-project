@extends('pages/includes/master')
@section('content')
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="padding: 150px 0 !important;">

        <div class="container aos-init aos-animate" data-aos="fade-up">
            <h1>Welcome <span class="text-primary">{{Illuminate\Support\Facades\Auth::user()->name}}</span></h1>
            <h4>Here you can see all your exams that you have taken and their scores</h4>
            <div class="row m-t-30">
                <div class="col-md-12 mt-5">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        @if($scores->count()===0)
                            <h4>There is no record available for this user</h4>
                        @else
                        <table class="table table-bordered  table-hover">
                            <thead class="thead-dark table-primary">
                            <tr>
                                <th>Created at</th>
                                <th>Exam</th>
                                <th>exam_category</th>
                                <th>score</th>
                                <th>exam max_score</th>
                                <th>exam duration(min)</th>
                                <th>show results</th>




                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scores as $score)

                                <tr>
                                    <td>{{$score->created_at}}</td>

                                    <td>{{$score->exam->name}}</td>
                                    <td>{{$score->exam->category->name}}</td>
                                    <td>{{$score->user_score}}</td>
                                    <td>{{$score->max_score}}</td>
                                    <td>{{$score->exam->duration}} min</td>
                                    <td><a href="{{route('single-result',['id'=>$score->exam_id,'skip'=>$loop->index,'user_score'=>$score->user_score,'max_score'=>$score->max_score])}}" class="btn btn-outline-primary btn-small">show answers</a></td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            @endif
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>



        </div>

    </section>
@endsection
