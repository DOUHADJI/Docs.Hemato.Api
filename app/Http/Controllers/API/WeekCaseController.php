<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeekCaseResource;
use App\Models\WeekCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeekCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestCase = WeekCase::orderBy("created_at", "desc")->first();
        $cases = WeekCase::where("id", "!=", $latestCase->id)->orderBy("created_at", "desc")->get();

        return new JsonResponse([
            "cases" => WeekCaseResource::collection($cases) ,
            "latestCase" => new WeekCaseResource($latestCase)
        ], Response::HTTP_OK);
    }
}
