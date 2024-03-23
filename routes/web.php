<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use App\Http\Controllers\PostsController;

/*

GET - Request a resource
POST - Create a new resource
PUT - Update a resource
PATCH -MOdify a resource
DELETE -Delete a resource
OPTIONS -Ask the server which verbs are allowed
*/
//Routes with Expression
 //Route::get('/blog{id}', [PostsController::class, 'show'])->where('id','[0-9]+');
 //Route::get('/blog{name}', [PostsController::class, 'show'])->where('name','[A-Za-z]+');
 //Route::get('/blog/{id}/{name}', [PostsController::class, 'show'])->where(['id' => '[0-9]+','name'=>'[A-Za-z]+']);
  //Route::get('/blog{name}', [PostsController::class, 'show'])->whereNumber('id');
   //Route::get('/blog{name}', [PostsController::class, 'show'])->whereAlpha('name');
    //Route::get('/blog{id}/{name}', [PostsController::class, 'show'])->whereNumber('id')-> whereAlpha('name');


 Route::prefix('/blog') ->group(function()
 {
    Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
    Route::get('/', [PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');
 Route::post('/', [PostsController::class, 'store'])->name('blog.store');
 Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');
Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');

 });
//Route::resource('blog', PostsController::class);

//Route for invoke method
Route::get('/', HomeController::class);

// Multiple HTTP verbs
//Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']); 
//Route::any('blog', [PostsController::class, 'index']);


// RETURN VIEW
//Route::view('/blog', 'blog.index', ['name' => 'Naima']);

//Fallback Route
Route::fallback(FallbackController::class);

