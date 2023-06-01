<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::apiResource('product', ProductController::class);

});