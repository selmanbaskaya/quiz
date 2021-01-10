<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group([
    'middleware' => ['auth', 'isAdmin'],
    'prefix' => 'admin'
    ], function () {
    Route::resource('quizzes', QuizController::class);
});
