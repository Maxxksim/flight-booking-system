<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AircraftController extends Controller
{

    public function index(): View
    {
        return view('aircraft-table', $this->getAircraftData());
    }

    private function getAircraftData(): array
    {
        $aircraft = Aircraft::all();

        $rows = $aircraft->map(function ($aircraft) {
            return [$aircraft->aircraft_id, $aircraft->model, $aircraft->seat_count, $this->switchStatus($aircraft->status)];
        });

        $headers = ['ID', 'Model', 'Seat Count', 'Status'];
        return compact('rows', 'headers');
    }
}
