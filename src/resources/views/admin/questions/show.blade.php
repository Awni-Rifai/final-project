@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row m-t-30">
                    <div class="col-lg-12">
                        <!-- TOP CAMPAIGN-->
                        <div class="top-campaign">
                            <h3 class="title-3 m-b-30">Question of the exam {{$question->exam->name}} </h3>
                            <div class="table-responsive">
                                <table class="table table-top-campaign">
                                    <tbody>
                                    <tr>
                                        <td>Created at</td>
                                        <td>{{$question->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>exam</td>
                                        <td>{{$question->exam->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>3. Turkey</td>
                                        <td>{{substr($question->title,0,50)}}</td>
                                    </tr>
                                    <tr>
                                        <td>answer_a</td>
                                        <td>{{substr($question->a,0,50)}}</td>
                                    </tr>
                                    <tr>
                                        <td>answer_b</td>
                                        <td>{{substr($question->b,0,50)}}</td>
                                    </tr>
                                    <tr>
                                        <td>answer_c</td>
                                        <td>{{substr($question->c,0,50)}}</td>
                                    </tr>
                                    <tr>
                                        <td>answer_d</td>
                                        <td>{{substr($question->d,0,50)}}</td>
                                    </tr>
                                    <tr>
                                        <td>correct_answer</td>
                                        <td>{{$question->answer}}</td>
                                    </tr>
                                    <tr>
                                        <td>points</td>
                                        <td>{{$question->points}}</td>
                                    </tr>
                                    <tr>
                                        <td>edit/delete</td>
                                        <td >
                                            <div class="table-data-feature">
                                                <a href="{{route('admin.questions.edit',$question->id)}}" class="item" data-toggle="tooltip"
                                                   data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <form action="{{route('admin.questions.destroy',$question->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </form>


                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--  END TOP CAMPAIGN-->
                    </div>
                </div>


@endsection
