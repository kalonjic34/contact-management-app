<?php

use App\Http\Controllers\API\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/contacts',ContactController::class);