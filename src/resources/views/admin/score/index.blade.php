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
                                <th>user</th>
                                <th>score</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scores as $score)
                            <tr>
                                <td>{{$score->created_at}}</td>
                                <td>{{$score->exam->name}}</td>
                                <td>{{$score->user->name}}</td>
                                <td>{{$score->user_score}}</td>


                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination --}}
                        <div class="d-flex mt-5 justify-content-center">
                            {!! $scores->links() !!}
                        </div>
                        <h1></h1>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>


            @endsection
