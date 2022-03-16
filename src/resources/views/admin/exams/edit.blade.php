@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Update Exam</div>
                        <div class="card-body card-block">
                            <form action="{{route('admin.exams.update',$exam->id)}}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                                @method("PUT")
                            <!-- name input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input type="text" id="add_category" name="name" value="{{$exam->name}}" placeholder="Add Exam" class="form-control">

                                    </div>
                                    @error('name')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- max_score input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input type="number" id="add_category" value="{{$exam->max_score}}" name="max_score" placeholder="max_score" class="form-control">

                                    </div>
                                    <span class="text-secondary small w-100 mx-5">max_score should be multiple of 5</span>
                                    @error('max_score')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- image input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>

                                        <input id="image" class="mx-3" type="file" placeholder="" name="image">

                                    </div>
                                    @error('image')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- duration input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>

                                        <select name="duration" id="">
                                            <option selected>Select Exam Duration</option>
                                            <option {{$exam->duration===30? "selected":""}} value="30">30 min</option>
                                            <option {{$exam->duration===45? "selected":""}} value="45">45 min</option>
                                            <option {{$exam->duration===60? "selected":""}} value="60">60 min</option>
                                            <option {{$exam->duration===90? "selected":""}} value="90">90 min</option>
                                            <option {{$exam->duration===120? "selected":""}} value="120">120 min</option>
                                        </select>

                                    </div>
                                    @error('duration')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- category input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>

                                        <select name="category_id" id="">
                                            <option selected>Select Exam Category</option>
                                            @foreach($categories as $category)
                                                <option {{$exam->category_id===$category->id?"selected":""}} value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('category_id')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm" name="submit">update Exam</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection

            <!--          --------------------------------------------Table------------------>


                <!-- end document-->
