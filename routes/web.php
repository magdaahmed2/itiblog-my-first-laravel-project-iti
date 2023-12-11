<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/navvv', function () {
    return view('nav');
});
Route::get('/iti', function()
{
return view("iti");
}
);
Route::get("/iti/posts", [PostController::class,'postList'])->name("iti.posts");
Route::get("/iti/posts/{id}", [PostController::class,'postShow'])->name("posts.show");


Route::get('/test', function()
{
return view("post");
}
);

//-----------------------day2---------------------------
Route::get("/post2/create",[PostController::class,"create"])->name("posts.create");
Route::get("/post2",[PostController::class,"index"])->name("posts.list");
Route::get("/post2/{id}",[PostController::class,"show2"])->name("posts.show2");
Route::get("/post2/delete/{id}",[PostController::class,"destroy"])->name("posts.delete");
Route::post("/post2/store",[PostController::class,"store"])->name("posts.store");
Route::get("/post2/edit/{id}",[PostController::class,"edit"])->name("posts.edit");
Route::put("/post2/update/{id}",[PostController::class,"update"])->name("posts.update");

//=========================day3==========================================
Route::resource('categories',CategoryController::class)->middleware('admin');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
