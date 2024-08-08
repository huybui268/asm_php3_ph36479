<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    const PATH_VIEW = 'admin.orders.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::all();
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('items', 'user');
        return view(self::PATH_VIEW.__FUNCTION__, compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->all();
        $order->update($data);

        return redirect()->route('admin.orders.index')->with('message', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function gerenatePdf(Order $order)
    {
        $order = $order->load('items', 'user');
        $data = [
                'title' => "Hóa đơn chi tiết",
                'date' => date('m/d/Y'),
                'order' => $order
        ];
    
        $pdf = Pdf::loadView('admin.orders.generate-order-pdf', $data);
        return $pdf->download('document.pdf');
    }
}
