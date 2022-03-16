@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">update question</div>
                        <div class="card-body card-block">
                            <form action="{{route('admin.questions.update',$question->id)}}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')
                            <!-- question input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input value="{{$question->title}}" name="title" id="" class="form-control" placeholder="Enter question title" >

                                    </div>
                                    @error('title')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- a input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input value="{{$question->a}}" type="text" id="add_category" name="a" placeholder="answer_a" class="form-control">

                                    </div>

                                    @error('a')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- b input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input value="{{$question->b}}" type="text" id="add_category" name="b" placeholder="answer_b" class="form-control">

                                    </div>

                                    @error('b')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- c input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input type="text" value="{{$question->c}}" id="add_category" name="c" placeholder="answer_c" class="form-control">

                                    </div>

                                    @error('c')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- d input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input type="text" value="{{$question->d}}" id="add_category" name="d" placeholder="answer_d" class="form-control">

                                    </div>

                                    @error('d')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- answer input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <select name="answer" id="">
                                            <option selected>Select Correct answer</option>
                                            <option {{$question->answer==="a"?'selected':""}} value="a">a</option>
                                            <option {{$question->answer==="b"?'selected':""}} value="b">b</option>
                                            <option {{$question->answer==="c"?'selected':""}} value="c">c</option>
                                            <option {{$question->answer==="d"?'selected':""}} value="d">d</option>

                                        </select>

                                    </div>

                                    @error('answer')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- points input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input value="{{$question->points}}" type="number" id="add_category" name="points" placeholder="points" class="form-control">

                                    </div>

                                    @error('points')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- exam_id input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <select name="exam_id" id="">
                                            <option selected>Select Exam</option>
                                            @foreach($exams as $exam)
                                                <option {{$exam->id===$question->exam_id?"selected":""}} value="{{$exam->id}}">{{$exam->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('exam_id')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm" name="submit">update question</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection

            <!--          --------------------------------------------Table------------------>


                <!-- end document-->
