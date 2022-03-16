<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {

        return view('admin.Categories.index', [

            'categories'      =>Category::all(),

            'auth_user'     =>Auth::user(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([

            'category_name'             =>'required|max:255|min:3',

            'category_img'              =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        if ($request->hasFile('category_img')) {

            $file           = $request->category_img;

            $new_file       = time() . $file->getClientOriginalName();

            $file ->move('admin_styles/images/categories', $new_file);
        }


        Category::create([

            "name"  => $request->category_name,
            "image"   =>  $new_file?? "avatar-01.jpg",
        ]);



        return redirect()->route('admin.categories.index');
    }


    /**
     * Display the specified resource.
     *

     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit($id)
    {

        return view('admin.Categories.edit', [

            'category'        => Category::find($id),
            'auth_user'         => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        //validation
        $request->validate([

            'category_name'             =>'required|max:255|min:3',

        ]);

        if ($request->hasFile('category_img')) {

            $file            = $request->category_img;

            $new_file        = time() . $file->getClientOriginalName();

            $file ->move('admin_styles/images/categories', $new_file);

            $category->image  = $new_file;

        }


       $category->name         = $request->category_name;

        $category->update();


        return redirect()->route('admin.categories.index');


    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($id)
    {
        $category = Category::find($id);

        //check if the category is already deleted
        if($category)$category -> delete();

        return redirect()->route('admin.categories.index');
    }




}
