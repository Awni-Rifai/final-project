@extends('pages/includes/master')
@section('content')
<div class="text-center mt-5   w-100 pt-5 px-0 " style="margin-top: 50px!important;">

    <h1>Your result is <span class="text-primary">{{$user_score}}</span>/{{$max_score }}</h1>
    <div class="div bg-danger card fw-bold text-white  my-3" style="width: 100px">wrong Answer</div>
    <div class="div bg-info card fw-bold text-white " style="width: 100px">correct Answer</div>
    <div class="row w-100 mx-auto justify-content-lg-center">
        @for($i = 0; $i < $questions->count(); $i++ )

            <div class=" card  col-lg-4 mx-lg-1 card-result py-5 my-3 shadow min-height-50  mt-5">

            <h3 class="font-small-sm h-75 h2--${i}">{{$questions[$i]->title}}</h3>
            @if($user_answers[$i]=="0")
                <span class="text-danger">Unanswered</span>
            @endif
            <ul class="list-group results-list ul--${i}">
                @if($questions[$i]->answer===$user_answers[$i])
                <li class="list-group-item {{$questions[$i]->answer==="a" ?"bg-info bg-gradient":""}} ">a {{$questions[$i]->a}}</li>
                <li class="list-group-item {{$questions[$i]->answer==="b" ?"bg-info bg-gradient":""}} ">b {{$questions[$i]->b}}</li>
                <li class="list-group-item {{$questions[$i]->answer==="c" ?"bg-info bg-gradient":""}} ">c {{$questions[$i]->c}}</li>
                <li class="list-group-item {{$questions[$i]->answer==="d" ?"bg-info bg-gradient":""}} ">d {{$questions[$i]->d}}</li>
                @else


                    <li class="list-group-item {{$questions[$i]->answer==="a" ?"bg-info bg-gradient":""}} {{$user_answers[$i]==="a" ?"bg-danger":""}} ">a {{$questions[$i]->a}}</li>
                    <li class="list-group-item {{$questions[$i]->answer==="b" ?"bg-info bg-gradient":""}} {{$user_answers[$i]==="b" ?"bg-danger":""}} ">b {{$questions[$i]->b}}</li>
                    <li class="list-group-item {{$questions[$i]->answer==="c" ?"bg-info bg-gradient":""}} {{$user_answers[$i]==="c" ?"bg-danger":""}} ">c {{$questions[$i]->c}}</li>
                    <li class="list-group-item {{$questions[$i]->answer==="d" ?"bg-info bg-gradient":""}} {{$user_answers[$i]==="d" ?"bg-danger":""}} ">d {{$questions[$i]->d}}</li>
                @endif

            </ul>

        </div>;
        @endfor
    </div>
</div>


@endsection
