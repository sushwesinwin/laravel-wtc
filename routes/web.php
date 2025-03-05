<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/posts', function() {
    $all = ["Web Development", "Laravel", "PHP", "JavaScript"];
    $posts = [
        "Web Development" => ["HTML", "CSS", "JavaScript"],
        "Laravel" => ["Eloquent", "Migrations", "Seeds"],
        "PHP" => ["Arrays", "Objects", "Functions"],
        "JavaScript" => ["Promises", "Async", "Objects"]
    ];
    return view('posts', ['categories' => $all, 'posts' => $posts]); //key-value pair, carry data to view with key!
});

Route::get('/hello', function() {
    return 'Hello World!'; //print Hello World! on browser
}); 

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
