<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Size;
use App\Models\Wishlist;


class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.products.wishlist',compact('wishlist'));
    }

    public function add(Request $request)
    {
        $prod_id = $request->input('product_id');
        $flavour_id = $request->input('flavour_id');
        $size_id = $request->input('size_id');
        $cake_message = $request->input('cake_message');


        if(Auth::check())
        {
            //product_id from from ajax script file
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->size_id = $size_id;
                $wish->flavour_id = $flavour_id;
                $wish->cake_message  = $cake_message ;
                
                

                
                $wish->save();
                return response()->json(['status' => "Product Added to Wishlist"]);
            }
            else{
                return response()->json(['status' => "Product does not exist"]);
            }
        }
        else{
            return response()->json(['status' => "Login to Continue click here "]);
        }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
    {
        $prod_id = $request->input('prod_id');
        if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
        {
            $wish = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            $wish->delete();
            return response()->json(['status' => "Item deleted Successfully"]);

        }
    }
    else
    {
        return response()->json(['status' => "Login to Continue".['category']]);
    }
 

    }

    public function  wishcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
}
