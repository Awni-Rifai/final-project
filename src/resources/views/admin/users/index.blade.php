@extends('admin.includes.master-page')
            <!-- MAIN CONTENT-->
            @section('content')

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Create Admin</div>
                                <div class="card-body card-block">
                                    <form action="{{route('admin.users.store')}}" method="post" class="">
                                        @csrf
                                            <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" id="username" name="name" placeholder="name" class="form-control">

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
                                                <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                            </div>
                                                @error('email')
                                                <div class="text-danger d-block px-2">{{$message}}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group" >
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                            </div>
                                            <span class="text-secondary small w-100 mx-5">password should be at least 8 character with uppercase,numbers and symbols</span>
                                                @error('password')
                                                <div class="text-danger d-block px-2">{{$message}}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group ">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                                <input type="password" id="password" name="password_confirmation" placeholder=" Confirm Password" class="form-control">
                                            </div>

                                            @error('password_confirmation')
                                            <div class="text-danger d-block px-2">{{$message}}</div>
                                            @enderror
                                        </div>

                                            <!-- Radio Input -->
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <label for="selectSm" class=" form-control-label">User Role</label>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <select name="role_id" id="SelectLm" class="form-control-sm form-control">
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Radio Input -->
                                        <div class="form-actions form-group">
                                            <button type="submit" name="submit" class="btn btn-success btn-sm">Create Admin</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

<!--          --------------------------------------------Table------------------>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                        <tr>
                                            <th>date of creation</th>
                                            <th>img</th>
                                            <th>user name</th>
                                            <th>user email</th>
                                            <th>user Role</th>
                                            <th>edit/delete</th>

                                        </tr>
                                        </thead>
                                        <tbody>

{{--                                        <form action="../includes/update_admin.php" method="post">--}}
{{--                                            <input type="hidden" name="admin_id" value="<?php echo $user['admin_id']?>">--}}
{{--                                        <tr>--}}
{{--                                            <td><input class="form-control update_field" name="date_created" type="text" value="<?php echo $user["date_created"]?>"></td>--}}
{{--                                            <td><i class='fa fa-user-shield update_field'></i></td>--}}
{{--                                            <td><input class="form-control update_field" name="admin_name" type="text" value="<?php echo $user["admin_name"]?>"></td>--}}
{{--                                            <td><input class="form-control update_field" name="admin_email" type="text" value="<?php echo $user["admin_email"]?>"></td>--}}
{{--                                            <td><input class="form-control update_field" name="admin_password" type="text" value="<?php echo $user["admin_password"]?>"></td>--}}

{{--                                            <td >--}}
{{--                                                <div class="table-data-feature">--}}

{{--                                                        <button class="item" data-toggle="tooltip"--}}
{{--                                                           type="submit" name="submit_update" data-placement="top" title="Edit">--}}
{{--                                                            <i class="fa fa-check"></i>--}}
{{--                                                        </button>--}}




{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            </tr>--}}
{{--                                        </form>--}}

                                            @foreach($users as $user)
                                            <tr>
                                            <td>{{$user->created_at}}</td>
                                            <td></td>
                                            <td>{{$user->name}}</td>

                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role->name}}</td>

                                            <td >
                                                <div class="table-data-feature">
                                                        <a href="{{route('admin.users.edit',$user->id)}}" class="item" data-toggle="tooltip"
                                                           data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                    <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
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
<!-- end document-->
