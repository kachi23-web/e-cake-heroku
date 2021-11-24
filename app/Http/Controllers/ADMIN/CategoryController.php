<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class categoryController extends Controller
{
    //
    public function index()
    {//fetches and display data from the database
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add(){
        return view ('admin.category.add');
    }

    public function insert(Request $request){
        $category = new Category();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            //to create a unique file :current time .file extension
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        //using tenary operator since valve cant be stored directly
        $category->status = $request->input('status') == TRUE? '1':0;
        $category->popular = $request->input('popular') == TRUE? '1':0;
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/dashboard')->with('status',"category Added successfully");
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
     public function update(Request $request, $id)
     {
         $category = category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image; 
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            //to create a unique file :current time .file extension
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE? '1':0;
        $category->popular = $request->input('popular') == TRUE? '1':0;
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        return redirect('dashboard')->with('status',"category updated Successfully");
     }

     public function destroy($id)
     {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status',"category Delete Successfully");
     }
}
