@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header mb-5">Add Category</div>
                        {{--         Cascade Error                  --}}
                        @if(request()->get('error'))

                            <div class="alert-danger text-center delete-alert h5 w-50 d-block m-auto shadow card p-4 ">
                                The Category you are trying to delete have some movies do you want to delete the movies also
                                <form action="{{route('admin.category.destroyCascade')}}"  class="p-3" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{request()->get('id')}}">
                                    <a href="{{route('admin.categories.index')}}" class="btn btn-outline-success">NO</a>
                                    <button class="btn btn-outline-danger">YES</button>

                                </form>




                            </div>
                        @endif
                        <div class="card-body card-block">
                            <form action="{{route('admin.categories.store')}}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input type="text" id="add_category" name="category_name" placeholder="Add Category" class="form-control">

                                    </div>
                                    @error('category_name')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>

                                        <input id="image" class="mx-3" type="file" placeholder="" name="category_img">

                                    </div>
                                    @error('category_img')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm" name="submit">Add Category</button>
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
                                    <th>category name</th>
                                    <th>edit/delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->created_at}}</td>
                                        <td><img class="img-fluid img-120" src="{{asset('admin_styles/images/categories/'.$category->image)}}" alt=""></td>
                                        <td>{{$category->name}}</td>


                                        <td >
                                            <div class="table-data-feature">
                                                <a href="{{route('admin.categories.edit',$category->id)}}" class="item" data-toggle="tooltip"
                                                   data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
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
