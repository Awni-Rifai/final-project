@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header mb-3">Add Exam</div>
                        @if(request()->get('error'))

                            <div class="alert-danger text-center delete-alert h5 w-50 d-block m-auto shadow card p-4 ">
                                The Exam you are trying to delete have some questions do you want to delete the questions also
                                <form action="{{route('admin.exam.destroyCascade')}}"  class="p-3" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{request()->get('id')}}">
                                    <a href="{{route('admin.exams.index')}}" class="btn btn-outline-success">NO</a>
                                    <button class="btn btn-outline-danger">YES</button>

                                </form>




                            </div>
                        @endif
                        <div class="card-body card-block">
                            <form action="{{route('admin.exams.store')}}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                            <!-- name input-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input type="text" id="add_category" name="name" placeholder="Add Exam" class="form-control">

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
                                        <input type="number" id="add_category" name="max_score" placeholder="max_score" class="form-control">

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
                                            <option value="30">5 min</option>

                                        </select>


                                    </div>
                                    <span class="text-secondary">currently we have only one exam duration</span>
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
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('category_id')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm" name="submit">Add Exam</button>
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
                                    <th>img</th>
                                    <th>exam_category</th>
                                    <th>exam name</th>
                                    <th>exam duration</th>
                                    <th>exam max_score</th>
                                    <th>edit/delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$exam->created_at}}</td>
                                        <td><img class="img-fluid img-120" src="{{asset('admin_styles/images/exams/'.$exam->image)}}" alt=""></td>
                                        <td>{{$exam->category->name}}</td>
                                        <td>{{$exam->name}}</td>
                                        <td>{{$exam->duration}}</td>
                                        <td>{{$exam->max_score}}</td>


                                        <td >
                                            <div class="table-data-feature">
                                                <a href="{{route('admin.exams.edit',$exam->id)}}" class="item" data-toggle="tooltip"
                                                   data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <form action="{{route('admin.exams.destroy',$exam->id)}}" method="post">
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
