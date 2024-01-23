<?php

use App\Http\Resources\CategoryResource;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tools;
use App\Models\Slider;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Category', function () {
    $category = Category::orderBy('title')->get();
    return $category;
});

Route::get('/Tools', function () {
    $tools = Tools::orderBy('title')->get();
    return $tools;
});

Route::get('/Slider', function () {
    $slider = Slider::orderBy('title')->get();
    return $slider;
});





