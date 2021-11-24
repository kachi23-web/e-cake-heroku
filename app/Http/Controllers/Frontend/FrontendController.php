<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FrontendController extends Controller
{
    //
    public function index()
    {
        
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();
        return view('index', compact('featured_products','trending_category'));
    }

    public function category()
     {


        $category = Category::where('status','1')->get();
        return view('frontend.products.category',compact('category'));
        // return view('frontend.category');

    }
    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('status',"slug does not exists");
        }
    }

    public function productview($cate_slug,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products = Product::where('slug',$prod_slug)->first();
                $featured_products = Product::where('trending','1')->take(15)->get();
                return view('frontend.shop.shop-details',compact('products','featured_products'));
            }
            else{
                return redirect('/')->with('status',"broken link");
            }
        }
        else{
            return redirect('/')->with('status',"No such category found");
        }
    }
}
