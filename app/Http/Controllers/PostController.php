<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class PostController extends Controller
{

    function __construct(){
        //  $this->middleware('auth')->only(["store", "destroy", "edit", "show","create"]);
             $this->middleware("auth")->except(["index", "show"]);
         }
    
function index(){
    // dump(Auth::user());
    $posts=Post::all();
    // dd($posts);
    return view("ITI.posts.index",['data'=>$posts]);
}
function show2($id){
    $category=Category::all();
    $post=Post::findorfail($id);
    return view("ITI.posts.show2",['data'=>$post,"category"=>$category]);
    // dd($posts);
}
function destroy($id){
    if(Gate::allows("is-admin")){
         $post=Post::findorfail($id);
         $post->delete();
         return to_route('posts.list');
}
return abort(403);
}
function create(){
   $category=Category::all();
    return view("ITI.posts.create" ,["data"=>$category]); 
 }
 function store(){

   request()->validate(
    [
        "title"=>"required |min:3",
        "sulg"=>"required",
        "body"=>"required",
        "version"=>"required",
        

    ],
    [
       "title.required"=>"post title is required",
       "title.min"=>"post title must be more than 3 chars",
       
    ]
    );


    $request_data = request()->all();
        $request_data['user_id'] = Auth::id();
        $post = Post::create($request_data);
       
  return to_route('posts.list');
 }



 function edit($id){
    $post=Post::findorfail($id);
    //  dd($post);
    return view("ITI.posts.edit",["data"=>$post]);
 }
 function update($id, Post $post){
    $post = Post::findorfail($id);
    
    if(auth()->user()->id == $post->user_id){
        $post= Post::findorfail($id);
   
   $post->title=request("title");
   $post->sulg=request("sulg");
   $post->body=request("body");
   $post->version=request("version");
   $post->image=request("image");
   $post->update();
   return to_route('posts.list');

 }
 abort(403);
}
    private $posts = [
        ["id" => "1", "title" => "post1", "description" =>"description1" ],
        ["id" => "2", "title" => "post2", "description" =>"description2" ],
        ["id" => "3", "title" => "post3", "description" =>"description3" ],
        ["id" => "4", "title" => "post4", "description" =>"description4" ],
        ["id" => "5", "title" => "post5", "description" =>"description5" ],
      
    ];

    function postList(){
        // return $this-> students;
        return view("posts.post", ["posts" => $this-> posts]);
    }

    function postShow($id){
        foreach($this->posts as $post){
            if($post["id"] == $id){
                // return $student;
                return view("posts.showpost", ["pos" => $post ]);

            };
        }
            return abort("404");
    }

    function home(){
        // return "HOME PAge";
        return view("Landing.home", ["name" => "PHP TRACK", "email" => "email@gmail.com"]);
    }

}
