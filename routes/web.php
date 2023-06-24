<?php

use App\Http\Controllers\API\CertificateController;
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
Route::get('/certificate', function () {
    return view('frontend.certificate');
});



Route::get('/cms/backend/project', function () {
    return view('backend.project');
});
Route::get('/cms/backend/certificate', function () {
    return view('backend.certificate');
});


Route::prefix('v1')->controller(ProjectController::class)->group(function () {
    Route::get('/project', 'getAllData');
    Route::post('/project/create', 'createData');
    Route::get('/project/get/{uuid}', 'getDataByUuid');
    Route::put('/project/update/{uuid}', 'updateDataByUuid');
    Route::delete('/project/delete/{uuid}', 'deleteData');

});

Route::prefix('v2')->controller(CertificateController::class)->group(function () {
    Route::get('/certificate', 'getAllData');
    Route::post('/certificate/create', 'createData');
    Route::get('/certificate/get/{uuid}', 'getDataByUuid');
    Route::put('/project/update/{uuid}', 'updateDataByUuid');
    Route::delete('/project/delete/{uuid}', 'deleteData');

});
