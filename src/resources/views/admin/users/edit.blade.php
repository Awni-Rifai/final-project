@extends('admin.includes.master-page')
<!-- MAIN CONTENT-->
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Update User</div>
                        <div class="card-body card-block">
                            <form class="edit_user" action="{{route('admin.users.update',$user->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" id="username" value="{{$user->name}}" name="name" placeholder="name" class="form-control">
                                    </div>
                                    @error('name')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="email" value="{{$user->email}}" id="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                    @error('email')
                                    <div class="text-danger d-block px-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-success my-2 change_password_btn">Change password</button>
                               <div class="passwords_containers">
                                   <div class="form-group hide_password-1" >

                                       @error('password')
                                       <div class="text-danger d-block px-2">{{$message}}</div>
                                       @enderror
                                   </div>
                                   <div class="form-group hide_password-2" >


                                       @error('password_confirmation')
                                       <div class="text-danger d-block px-2">{{$message}}</div>
                                       @enderror
                                   </div>
                               </div>
                                <div class="row form-group">
                                    <div class="col col-md-1">
                                        <label for="selectSm" class=" form-control-label">User Role</label>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <select name="role_id" id="SelectLm" class="form-control-sm form-control">
                                            @foreach($roles as $role)
                                                <option {{$user->role_id===$role->id?"selected":""}} value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-actions form-group">
                                    <button type="submit" name="submit" class="btn btn-success btn-sm">Create Admin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection

                <!--          --------------------------------------------Table------------------>


            <!-- end document-->
