<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status','0')->get();
        return view('admin.order.index',compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id',$id)->first();
         return view('admin.order.view',compact('orders'));  
    }

    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status', 'order Updated Successfull');


    }
    public function orderhistory(){
        $orders = Order::where('status','0')->get();
        return view('admin.order.history',compact('orders'));

    }
}
