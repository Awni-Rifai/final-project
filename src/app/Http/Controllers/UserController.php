<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function index(){


        return view('admin.users.index',[
            'users'=>User::all()
                            ->sortByDesc('role_id'),

            'roles'=>Role::all()
        ]);


    }
    public function store(Request $request)
    {


        $request->validate([
            'name'                 =>'required|max:255|min:3',
            'email'                =>'required|email|max:255|min:3',
            'password'             => config('validation.PASSWORD'),
            'password_confirmation'=>'min:3|required',
            'role_id'              =>'required',

        ]);


        $user=new User();
        $user->name                 =$request->name;
        $user->password             =Hash::make($request->password);
        $user->email                =$request->email;
        $user->role_id              =$request->role_id;
        $user->save();

        return view('admin.users.index',[

            'users'     =>User::all()
                              ->sortByDesc('role_id'),

            'auth_user' =>Auth::user(),

        ]);




    }

    /**
     * Display the specified resource.
     *

     */
    public function show(User $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit($id)
    {

        return view("admin.users.edit",[

            'user'          =>user::find($id),
            'roles'         =>Role::all(),
            //'auth_user'=>Auth::user(),

        ]);
    }



    public function update(Request $request, $id)
    {
        $user=User::find($id);
        //check if the admin doesn't want to change the password
        if(isset($request->password)){
            $request->validate([

                    'password'      =>config('validation.PASSWORD')
            ]);

            $user->password     = Hash::make($request->password);
        }



        $request->validate([
                    'name'      => 'required',
                    'email'     => 'required|email|max:255|min:3',
                    'role_id'   =>  'required',
                 ]);

        $user->name                =  $request->name;
        $user->email               =  $request->email;
        $user->role_id             =  $request->role_id;

        $user->save();

        return redirect()
                ->route('admin.users.index')
                ->with('success','the user is added successfully');



    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('admin.users.index')
            ->with('success','The user has been deleted successfully');
    }
}
