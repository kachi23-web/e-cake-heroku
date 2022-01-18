<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ToolCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ToolCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check)
            {
                if(ToolCart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' =>$prod_check->name."Already Added to cart"]);

                }
                else
                {
                    $cartItem = new ToolCart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name."Added to cart"]);
                }
                
    
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolCart  $tool
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cartitems = ToolCart::where('user_id',Auth::id())->get();
        return view('frontend.tools.baking-tools', compact('cartitems'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToolCart  $tool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
   
        if(Auth::check())
        {
           $prod_id = $request->input('prod_id');
           if(ToolCart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists());
           {
               $toolcart = ToolCart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
               $toolcart->prod_qty = $product_qty;
               $toolcart->update();
               return response()->json(['status'=>'quantity updated']);
           }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolCart  $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(ToolCart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = ToolCart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Item deleted Successfully"]);
    
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
       }
    
}
