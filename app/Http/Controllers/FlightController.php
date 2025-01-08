<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\City;
use App\Models\Flight;
use App\Models\Pilot;
use Illuminate\View\View;


class FlightController extends Controller
{

    public function index(): View
    {
        return view('flight-table', $this->getFlightsData());
    }

    private function getFlightsData(): array
    {
        $flights = Flight::all();

        $rows = $flights->map(function ($flight) {

            $aircraft = Aircraft::where('aircraft_id', $flight->aircraft_id)->first();
            $pilot = Pilot::where('pilot_id', $flight->pilot_id)->first();
            $departure_city = City::where('city_id', $flight->departure_city_id)->first();
            $arrival_city = City::where('city_id', $flight->arrival_city_id)->first();

            return [
                $flight->flight_id,
                $aircraft->model,
                $pilot->name,
                $departure_city->name,
                $arrival_city->name,
                $flight->departure_date,
                $flight->arrival_date,
                substr($flight->departure_time, 0, 5),
                substr($flight->arrival_time, 0, 5),
                $flight->price,
                $this->switchStatus($flight->status)];
        });

        $headers = [
            'ID',
            'Aircraft',
            'Pilot',
            'Departure City',
            'Arrival City',
            'Departure Date',
            'Arrival Date',
            'Departure Time',
            'Arrival Time',
            'Price $',
            'Status'];

        return compact('rows', 'headers');
    }
}
