<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function todayOrders()
    {
        $todayOrders = Order::whereDate('created_at', Carbon::today())->get();
        return view('admin.order.today-order', compact('todayOrders'));
    }

    public function allOrders()
    {
        $allOrders = Order::orderBy('id', 'desc')->select(['id', 'first_name', 'last_name', 'phone', 'total_price', 'total_qty'])->get();
        return view('admin.order.all-order', compact('allOrders'));
    }

    public function orderDetails($id)
    {
        $orderDetails = Order::with('orderDetails')->find($id);
        return view('admin.order.details', compact('orderDetails'));
    }

    public function pdfDownload($id)
    {
        $order = Order::with('orderDetails')->find($id);

        $pdf = PDF::loadView('admin.order.invoice', compact('order'));
        return $pdf->download('invoice.pdf');
    }
}
