<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $area=Area::all();
        return response()->json($area);
    }

    public function areaByRegion($regionId ){
        $area=Area::where('region_id',$regionId)->get();
        return response()->json($area);
    }
}
