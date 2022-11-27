<?php

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

Route::controller(StudentController::class)->group(function(){
    Route::get('/', 'index')->name('student.index');
    Route::get('student/create/', 'create')->name('student.create');
    Route::post('student/uploadfile', 'uploadFile')->name('image.uploadfile');
    Route::post('student/store', 'createOrUpdateStudent')->name('student.store');
    Route::get('student/delete/{id}', 'removeStudent')->name('student.delete');
    Route::get('student/update/{id?}', 'create')->name('student.update');
    /** mark */
    Route::get('/mark', 'markList')->name('mark.index');
    Route::get('mark/create/', 'addMark')->name('mark.create');
    Route::post('mark/uploadfile', 'uploadFile')->name('image.uploadfile');
    Route::post('mark/store', 'AddOrUpdateMark')->name('mark.store');
    Route::get('mark/delete/{id}', 'removeMark')->name('mark.delete');
    Route::get('mark/update/{id?}', 'addMark')->name('mark.update');
});