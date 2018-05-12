<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verify');
    }

    public function index()
    {
        //
       $categories = \App\Category::all();
       return view('categories.index',compact('categories'));
    }

        public function save(Request  $request){
         if ($request->hasFile('thumbnail') && $request->thumbnail->isValid()) {
             $extension = $request->thumbnail->extension();
             $filename = time()."_.".$extension;
             $request->thumbnail->move(public_path('images'), $filename);
         }else{
            $filename = 'no_image.png';
         }


         $created = Category::create([
            'title'      =>$request ->title,
            'thumbnail'  =>$filename,
            'price'      =>$request->price,
            'size'       =>$request->size,
            'color'      =>$request->color,
            'product_id' =>$request->product,
            'user_id'    =>$request->seller
            ]);
         if ($created) {
            return redirect('/categories/create')->with('message','Category Added Successfully');
         }
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function search_code(Request $request){
     
          $search = $request->search_code;
          $categories = Category::where('title', 'like' , "$search")->paginate(12);
          return view('categories.index',compact('categories'));
    
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::find($id);
        return view('categories.detail', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('categories.edit' , compact('category'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
        {
         if ($request->hasFile('thumbnail') && $request->thumbnail->isValid()) {
             $extension = $request->thumbnail->extension();
             $filename = time()."_.".$extension;
             $request->thumbnail->move(public_path('images'), $filename);
         }else{
            $filename = $request->image;
         }
        //  
        $category = Category::find($request->id);
        $category->title      = $request->title;
        $category->thumbnail  = $filename;
        $category->price      = $request->price;
        $category->size      = $request->size;
        $category->color      = $request->color;
        $category->product_id = $request->seller;
        $category->user_id    = $request->user;        
        $updated              = $category->save();
        if ($updated) {
            return redirect('/categories')->with('message', 'Category updated Successfully');
        }

    }

   public function delete($id)
    {
        $category = Category::find($id);
        $deleted = $category->delete();
        if ($deleted) {
            return redirect('/products/categories')->with('message','Category Deleted Successfully');
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
         public function check(){
        $categories = \App\Category::all();
        return view('users.check',compact('categories'));
     }
}
