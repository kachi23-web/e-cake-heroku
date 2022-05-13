<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;




class UserController extends Controller
{
   public function index()
   {
       $orders = Order::where('user_id', Auth::id())->get();
       return view('frontend.orders.index',compact('orders'));
   }

   public function view( $id)
   {
        $orders =  Order::where('id',$id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view',compact('orders'));

        
        
   }
}
