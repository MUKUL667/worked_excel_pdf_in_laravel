<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichssss
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [EmployeeController::class, 'showEmployees']);
Route::get('/employee/pdf', [EmployeeController::class, 'createPDF']);
Route::get('file-import-export', [EmployeeController::class, 'fileImportExport']);
Route::post('file-import', [EmployeeController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [EmployeeController::class, 'fileExport'])->name('file-export');


Route::get('/testing', [ImageController::class, 'index'])->name('testing');
Route::post('/savetest', [ImageController::class, 'create'])->name('savetest');
Route::get('/dynamiccontent', [ImageController::class, 'dynamic'])->name('dynamiccontent');
Route::get('/dynamic_content', [ImageController::class, '_dynamic'])->name('dynamic_content');
Route::get('/test', [ImageController::class, '_index'])->name('images');
Route::get('/deletetest/{id}', [ImageController::class, 'destroy'])->name('delete');
Route::get('/viewimage', [ImageController::class, 'view'])->name('viewimage');
