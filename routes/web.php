<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        // $posts = auth()->user()->userPosts()->latest()->get();
        $posts = Post::where("user_id", auth()->user()->id)->get();
    }
    return view('home', ["posts" => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);


//  Blog post related routes
Route::post("/create-post", [PostController::class, "createPost"]);
Route::get('/edit-post/{id}', [PostController::class, 'showEditScreen']);
