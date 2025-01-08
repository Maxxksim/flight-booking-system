<?php

namespace App\Http\Controllers;

use App\Models\Pilot;
use Illuminate\View\View;

class PilotController extends Controller
{

    public function index(): View
    {
        return view('pilot-table', $this->getPilotsData());
    }

    private function getPilotsData(): array
    {
        $pilots = Pilot::all();

        $rows = $pilots->map(function ($pilot) {
            return [$pilot->pilot_id, $pilot->name, $pilot->email, $pilot->flight_count];
        });

        $headers = ['ID', 'Name', 'Email', 'Flight Count'];

        return compact('rows', 'headers');
    }
}
