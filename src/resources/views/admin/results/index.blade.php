@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <form class="form-header search_form" action={{route('admin.results.index')}} method="GET">
                    <select class="mx-2 filter-search" name="type" id="">
                        <option value="user">user</option>
                        <option value="exam_title">exam_title</option>
                    </select>
                    <input class="au-input au-input--xl search_input" type="text" name="search" placeholder="Search for a user" />
                    <button class="au-btn--submit" type="button">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <span class="text-danger error-span"></span>
                </form>
                <span class="text-danger mx-4 h6">{{$error}}</span>


                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                <tr>
                                    <th>Created at</th>
                                    <th>exam</th>
                                    <th>question</th>
                                    <th>user</th>
                                    <th>user_answer</th>
                                    <th>delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{$result->created_at}}</td>
                                        <td>{{$result->question->exam->name}}</td>
                                        <td>{{$result->question->title}}</td>
                                        <td>{{$result->user->name}}</td>
                                        <td>{{$result->user_answer}}</td>

                                        <td >
                                            <div class="table-data-feature">

                                                <form action="{{route('admin.results.destroy',$result->id)}}" method="post">
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
                            <div class="d-flex mt-5 justify-content-center">
                                {!! $results->links() !!}
                            </div>
                            <h1></h1>
                        </div>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>


@endsection
