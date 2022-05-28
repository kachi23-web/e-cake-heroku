<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\Flavour;
use App\Models\Frontend;


class FrontendController extends Controller
{
    //
    

    public function index(Request  $id)
    
    {
        /* if(Category::where('slug',$slug)->exists())
        ->where( Auth::id())
        { */
        
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();
        $products = Product::find($id)->first(); 
        $category = Category::find($id )->first(); 

        //$category = Category::where('id',$cate_id)->first();
        //$products = Product::where('cate_id',$category->id)->where('status','0')->get();

        $wedding_cakes = Product::where('cate_id','5')->take(2)->get();
        $birthday_cakes = Product::where('cate_id','6')->take(2)->get();
        $celebration_cakes = Product::where('cate_id','9')->take(2)->get();
        $queens = Product::where('cate_id','7')->take(2)->get();

        //$category = Category::where('id',$cate_id)->first();
        //$products = Product::where('id',$prod_slug)->first();

        
        
        //$category = Category::where('id')->get();
        //$category = Category::where('id',$id)->take(15)->first();
        //return view('index', compact('featured_products','trending_category','wedding_cakes','birthday_cakes','products','category'));
        return view('index', compact('featured_products','trending_category','wedding_cakes','birthday_cakes','celebration_cakes','queens','category','products'));
        //dd($slug);
    
}

    public function blog()
    {
     
        return view('frontend.blog');
    }


    public function contact()
    {
     
        return view('frontend.contact');
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

    /* public function productview($cate_id,$prod_id)
    {
        if(Category::where('slug',$cate_id)->exists())
        {
            if(Product::where('slug',$prod_id)->exists())
            {
                $products = Product::where('slug',$prod_id)->first(); */
                $featured_products = Product::where('trending','1')->take(15)->get();
                $sizes = Size::all();
                $flavours = Flavour::all();
                $message = ('cake_message');
               // dd ($size[0]);
        
             return view('frontend.shop.shop-details',compact('products','featured_products','sizes','flavours'));
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
