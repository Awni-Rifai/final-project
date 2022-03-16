@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

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
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>


@endsection
