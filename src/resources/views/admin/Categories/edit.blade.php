@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Update Category</div>
                        <div class="card-body card-block">
                            <form class="edit_user" action="{{route('admin.categories.update',$category->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <input type="text" id="add_category" value="{{$category->name}}" name="category_name" placeholder="Add Category" class="form-control">

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
                                    <button type="submit" name="submit" class="btn btn-success btn-sm">edit category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection

            <!--          --------------------------------------------Table------------------>


                <!-- end document-->
