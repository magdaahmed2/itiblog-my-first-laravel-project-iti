<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\updateCategoryController;
use App\Http\Requests\StoreCategoryController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
class CategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category=Category::all();
        return view("ITI.category.index",["data"=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       
        return view("ITI.category.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryController $request)
    {
       // dd($request->all());
       $data = $request->all();
       if($request->hasFile("logo")){
           $categoryImage = $data["logo"];
           $path = $categoryImage->store("uploadedImage", 'category_images');
           // dd($path);
           $data["logo"]= $path;
       }
        //
        Category::create($data);

        return to_route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
        return view("ITI.category.show",["data"=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("ITI.category.edit",["data"=>$category]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCategoryController $request, Category $category)
    {
        $allowUser = Gate::inspect("update", $category);
        if($allowUser->allowed()){
            $category->update($request->all());
            return to_route("categories.index");
        };

        return abort(403);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
      
        if($category->logo){
            try{
                unlink("Images/category_images/{$category->logo}");
            }catch(Execption $err){
                dd($err);
            }
        }


        $category->delete();
        return to_route("categories.index");
    }
    
}
