<?php

use App\Http\Controllers\API\ProjectController;
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

Route::get('/', function () {
    return view('frontend.about');
});

Route::get('/project', function () {
    return view('frontend.project');
});


Route::get('/cms/backend/project', function () {
    return view('backend.project');
});


Route::prefix('v1')->controller(ProjectController::class)->group(function () {
    Route::get('/project', 'getAllData');
    Route::post('/project/create', 'createData');
    Route::get('/project/get/{uuid}', 'getDataByUuid');
    Route::put('/project/update/{uuid}', 'updateDataByUuid');
    Route::delete('/project/delete/{uuid}', 'deleteData');

});
