<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\user;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //removes items that are not in stock or not up to the total the use added to cart
        $old_cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        //$cartitems = Cart::where('user_id', Auth::id())->get()
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.shop.checkout',compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname'); 
        $order->lname = $request->input('lname');  
        $order->email = $request->input('email'); 
        $order->phone = $request->input('phone'); 
        $order->address1 = $request->input('address1'); 
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->area = $request->input('pincode');
        $order->area = $request->input('area');
        $order->LGA = $request->input('LGA');

        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');
        //$order->flavour_id = $request->input('flavour_id');
        //$order->size_id = $request->input('size_id');
        //$order->cake_message = $request->input('cake_message');
        //$order->tracking_no = 'cakes'.rand(1111,9999); 
        
    
       //  $order->id;
       // To Calculate the total price
        $total = 0;

        $cartitems_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->products->selling_price;
        }

        $order->total_price = $total;

        $order->tracking_no = 'cakes'.rand(1111,9999);
        $order->save();
        
        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty'=> $item->prod_qty,
                'price' => $item->products->selling_price,
                'state' => $item->products->state,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        //checks if user has filled in the billing details
        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname'); 
            $user->lname = $request->input('lname');  
            $user->phone = $request->input('phone'); 
            $user->address1 = $request->input('address1'); 
           // $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->update();
        }
        //empty the carts after placing an order
        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);

        if ($request->input('payment_mode') == "payment by Razorpay" || $request->input('payment_mode') == "paid by Paypal") 
        {
            return response()->json(['status' => "Order placed Successfully"]);
        }

        return redirect('/')->with('status',"order placed successfully");
    }

    
    public function razorpaycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item)
        {
           
            $total_price += $item->products->selling_price * $item->prod_qty;
        }

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $address1  =$request->input('address1');
        $city   = $request->input('city');
        $state = $request->input('state');
        $pincode = $request->input('pincode');  
        $phone  = $request->input('phone');
        $email   = $request->input('email'); 

        return response()->json([
            'firstname'=>$firstname,
            'lastname '=>$lastname,
            'address1'=>$address1,
            'city'=>$city,
            'state'=>$state,
            'pincode'=>$pincode,
            'phone'=>$phone,
            'email'=>$email,
            'total_price'=>$total_price     
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $Request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $Request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
