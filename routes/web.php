<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\QuizController;
use App\http\Controllers\AttemptController;
use App\http\Controllers\QuestionController;
use App\http\Controllers\AuthController;

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
    return view('welcome');
});


// routes/web.php
Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quizzes/create', [QuizController::class, 'create'])->middleware('auth');
Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quizzes.show');
Route::post('/quizzes', [QuizController::class, 'store'])->middleware('auth');

Route::get('/quizzes/questions/create{id}', [QuestionController::class, 'create'])->name('question.add')->middleware('auth');
Route::post('/quizzes/{id}/questions', [QuestionController::class, 'store'])->name('questions.store')->middleware('auth');

Route::get('/quizzes/{id}/attempt', [AttemptController::class, 'create'])->middleware('auth');
Route::post('/quizzes/{id}/attempts', [AttemptController::class, 'store'])->name('attempts.store')->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
