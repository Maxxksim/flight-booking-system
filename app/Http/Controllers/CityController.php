<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        return view('city-table', $this->getCitiesData());
    }

    private function getCitiesData(): array
    {
        $cities = City::all();

        $rows = $cities->map(function ($city) {
            return [$city->city_id, $city->name, $city->country];
        });

        $headers = ['ID', 'Name City ', 'Country'];

        return compact('rows', 'headers');
    }
}
