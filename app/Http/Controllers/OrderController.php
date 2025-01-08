<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function index(): View
    {
        return view('order-table', $this->getOrdersData());
    }

    private function getOrdersData(): array
    {
        $orders = Order::all();

        $rows = $orders->map(function ($order) {

            $user = User::where('id', $order->user_id)->first();

            return [$order->order_id, $order->flight_id, $user->name, $order->seat_count, $user->email];
        });

        $headers = ['ID', 'Flight ID', 'User name', 'Seat count', 'Email'];

        return compact('rows', 'headers');
    }
}
