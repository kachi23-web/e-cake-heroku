<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Shoping;
use App\Models\Size;

class ShopingController extends Controller
{

    public function add()
    {
       $size = Size::all();
       return view('frontend.shop.shoping-details', compact('size'));
    }

    public function addDetail(Request $request) 
    {
        
        
        /* $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $cake_message = $request->input('cake_message');
        $flavour = $request->input('flavour');
        $size_id = $request->input('size_id');
        $order_details = $request->input('order_details');
        $total_price = $request->input('total_price'); */
        // if(Auth::check())
        // {
        //     $prod_check = Product::where('id',$product_id)->first();

        //     if($prod_check)
        //     {
        //         if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
        //         {
        //             return response()->json(['status' =>$prod_check->name."Already Added to cart"]);

        //         }
        //         else
        //         {
            $product = Product::all();

            $shopDetail = new Shoping();
            if($request->hasFile('customerimage'))
            {
                $file = $request->file('customerimage');
                $ext = $file->getClientOriginalExtension();
                //to create a unique file :current time .file extension
                $filename = time().'.'.$ext;
                $file->move('assets/uploads/shoping',$filename);
                $shopDetail->image = $filename;
            }



                   // $shopDetail = new Shoping();
                   /*  $shopDetail->prod_id = $product_id;
                    $shopDetail->user_id = Auth::id();
                    $shopDetail->prod_qty = $product_qty; 
                    $shopDetail->cake_message = $cake_message;
                    $shopDetail->flavour = $flavour;
                    $shopDetail->size_id = $size_id;
                    $shopDetail->order_details = $order_details;
                    $shopDetail->total_price = $total_price; */

                    $shopDetail->prod_id = $request->input('product_id');
                    $shopDetail->user_id = $request->Auth::id();
                    $shopDetail->prod_qty =  $request->input('product_qty'); 
                    $shopDetail->cake_message =  $request->input('cake_message');
                    $shopDetail->flavour =  $request->input('flavour');
                    $shopDetail->size_id = $request-> input('size_id');
                    $shopDetail->order_details = $request-> input('order_details');
                    $shopDetail->total_price = $request-> input('total_price');
                    $shopDetail->save();

                    dd($request);
                    //return response()->json(['status' => 'prod_id'."Added to cart"]);



        //         }
                
    
        //     }
        // }
        // else
        {
            return response()->json(['status' => "Login to Continue"]);
        }

    
    }   
}
