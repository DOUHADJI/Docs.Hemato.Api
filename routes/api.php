<?php

use App\Http\Controllers\API\ProcessController;
use App\Http\Controllers\API\StepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(StepController::class)->prefix("steps")->group(function()
{
    Route::get("/", "index");
});

Route::controller(ProcessController::class)->prefix("processes")->group(function()
{
    Route::get("/{slug}", "show");
});
