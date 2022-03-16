<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     *
     */
    public function index()
    {

        if(!Auth::user())return view('pages.index');
        $name=Auth::user()->role->name;
        if($name==="admin" ||$name==="super_admin"){

            return redirect()->route('admin.');


        }
        return redirect(route('main_page'));
    }
}
