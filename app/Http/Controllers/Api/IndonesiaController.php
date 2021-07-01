<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class IndonesiaController extends Controller
{
    public function index(Request $request)
    {

        if ($request->input('province_id')) {
            /// ini fetch regency
            $regencies = Regency::where('province_id', $request->input('province_id'))->get();
            return ResponseController::success($regencies);

        } else if ($request->input('regency_id')) {
            /// ini fetch district
            $district = District::where('regency_id', $request->input('regency_id'))->get();
            return ResponseController::success($district);

        } else if ($request->input('district_id')) {
            /// ini fetch village
            $villages = Village::where('district_id', $request->input('district_id'))->get();
            return ResponseController::success($villages);

        } else {
            /// ini fetch provinsi
            $provinces = Province::all();
            return ResponseController::success($provinces);
        }
    }
}
