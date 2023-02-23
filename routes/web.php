<?php

use App\Http\Controllers\CalcController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/students',[StudentController::class, 'index'])->name('students.index');
Route::get('/students/create',[ StudentController::class, 'create'])->name('students.create');
Route::post('/students/save',[ StudentController::class, 'save'])->name('students.save');
Route::get('/students/{id}/edit',[ StudentController::class, 'edit'])->name('students.edit');
Route::post('/students/{id}/update',[StudentController::class,'update'])->name('students.update');
Route::get('/students/{id}/delete',[StudentController::class,'delete'])->name('students.delete');

Route::resource('courses', CourseController::class);

Route::get('/calc/',[CalcController::class, 'showForm' ])->name("form");
Route::post('/calc/result',[CalcController::class, 'result' ])->name("result");

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
