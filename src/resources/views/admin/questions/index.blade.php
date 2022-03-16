@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Add question</div>
                        <div class="card-body card-block">
                            <form action="{{route('admin.questions.store')}}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                            <!-- question input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input name="title" id="" class="form-control" placeholder="Enter question title" >

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
                                        <input type="text" id="add_category" name="a" placeholder="answer_a" class="form-control">

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
                                        <input type="text" id="add_category" name="b" placeholder="answer_b" class="form-control">

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
                                        <input type="text" id="add_category" name="c" placeholder="answer_c" class="form-control">

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
                                        <input type="text" id="add_category" name="d" placeholder="answer_d" class="form-control">

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
                                            <option value="a">a</option>
                                            <option value="b">b</option>
                                            <option value="c">c</option>
                                            <option value="d">d</option>

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
                                        <input type="number" id="add_category" name="points" placeholder="points" class="form-control">

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
                                                <option value="{{$exam->id}}">{{$exam->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('exam_id')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm" name="submit">Add question</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                <tr>
                                    <th>Created at</th>
                                    <th>exam</th>
                                    <th>title</th>
                                    <th>answer_a</th>
                                    <th>answer_b</th>
                                    <th>answer_c</th>
                                    <th>answer_d</th>
                                    <th>correct_answer</th>
                                    <th>points</th>
                                    <th>edit/delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td>{{$question->created_at}}</td>
                                        <td>{{$question->exam->name}}</td>
                                        <td>{{substr($question->title,0,10)}}..</td>
                                        <td>{{substr($question->a,0,5)}}..</td>
                                        <td>{{substr($question->b,0,5)}}..</td>
                                        <td>{{substr($question->c,0,5)}}..</td>
                                        <td>{{substr($question->d,0,5)}}..</td>
                                        <td>{{$question->answer}}</td>
                                        <td>{{$question->points}}</td>



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
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>


@endsection
