<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Size;


class CartController extends Controller
{
    
    

    public function insert(Request $request) 
    {
        
    
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $flavour_id = $request->input('flavour_id');
        $size_id = $request->input('size_id');
        $cake_message = $request->input('cake_message');
       // $total_price = $request->input('selling_price');


        // $cart->size_id = $request->input('size_id');

       /*  
        $flavour = $request->input('flavour');
        $size_id = $request->input('size_id');
        $order_details = $request->input('order_details');
        $total_price = $request->input('total_price');  */

        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' =>$prod_check->name."Already Added to cart"]);

                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->size_id = $size_id;
                    $cartItem->flavour_id = $flavour_id;
                    $cartItem->cake_message = $cake_message;
                    //$cartItem->total_price = $total_price;


                    //inputs from shop details
                    /* $cartItem->cake_message = $cake_message;
                    $cartItem->flavour = $flavour;
                    $cartItem->size_id = $size_id;
                    $cartItem->order_details = $order_details;
                    $cartItem->total_price = $total_price; */


                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name  .  "Added to cart"  .  'hello']);
                    //return redirect('frontend.shop.cart', compact('cartitems'));
                }
                
    
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue click here "]);
        }

    
    }   

    public function viewcart()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.shop.cart', compact('cartitems'));
    }

    public function updatecart(Request $request)
 {
     $prod_id = $request->input('prod_id');
     $product_qty = $request->input('prod_qty');

     if(Auth::check())
     {
        $prod_id = $request->input('prod_id');
        if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists());
        {
            $cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            $cart->prod_qty = $product_qty;
            $cart->update();
            return response()->json(['status'=>'quantity updated']);
        }
     }

 }

   public function deleteProduct(Request $request)
   {
    if(Auth::check())
    {
        $prod_id = $request->input('prod_id');
        if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
        {
            $cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status' => "Item deleted Successfully"]);

        }
    }
    else
    {
        return response()->json(['status' => "Login to Continue".['category']]);
    }
   }
 
   
}


