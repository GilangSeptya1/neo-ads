<?php

namespace App\Http\Controllers;

use App\Models\MasterProvince;
use App\Models\MasterCity;
use App\Models\MasterDistrict;
use App\Models\MasterSubdistrict;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Get provinces (autocomplete)
     */
    public function provinces(Request $request)
    {
        return MasterProvince::query()
            ->when($request->q, fn ($q) =>
                $q->where('name', 'like', '%' . $request->q . '%')
            )
            ->orderBy('name')
            ->limit(20)
            ->get(['id', 'name']);
    }

    /**
     * Get cities by province
     */
    public function cities(Request $request)
    {
        return MasterCity::query()
            ->where('province_id', $request->province_id)
            ->when($request->q, fn ($q) =>
                $q->where('name', 'like', '%' . $request->q . '%')
            )
            ->orderBy('name')
            ->limit(20)
            ->get(['id', 'name']);
    }

    /**
     * Get districts by city
     */
    public function districts(Request $request)
    {
        return MasterDistrict::query()
            ->where('city_id', $request->city_id)
            ->when($request->q, fn ($q) =>
                $q->where('name', 'like', '%' . $request->q . '%')
            )
            ->orderBy('name')
            ->limit(20)
            ->get(['id', 'name']);
    }

    /**
     * Get subdistricts by district
     */
    public function subdistricts(Request $request)
    {
        return MasterSubdistrict::query()
            ->where('district_id', $request->district_id)
            ->when($request->q, fn ($q) =>
                $q->where('name', 'like', '%' . $request->q . '%')
            )
            ->orderBy('name')
            ->limit(20)
            ->get(['id', 'name']);
    }
}
