<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Auth;
use Gate;
use App\User;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
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


    public function index(Request $request)
    {
        //

     $products = Product::all();
     return view('products.index', compact('products'));
    }

        public function save(Request  $request){
         if ($request->hasFile('thumbnail') && $request->thumbnail->isValid()) {
             $extension = $request->thumbnail->extension();
             $filename = time()."_.".$extension;
             $request->thumbnail->move(public_path('images'), $filename);
         }else{
            $filename = 'no_image.png';
         }
.
         $created = Product::create([
            'title'    =>$request ->title,
            'thumbnail'=>$filename,
            'price'    =>$request->price,
            'size'     =>$request->size,
            'color'    =>$request->color,
            'user_id'  =>$request->seller,
            'brandname'=>$request->brand
            ]);
         if ($created) {
            return redirect('/products/create')->with('message','Product Added Successfully');
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
        return view('products.create');
    }

    public function filter(){
    $products = Product::where(function($query){

    $min_price = Input::has('min_price') ? Input::get('min_price') :null;
    $max_price = Input::has('max_price') ? Input::get('max_price') :null;

    $brands = Input::has('brands') ? Input::get('brands') : [];

     if (isset($min_price) && isset($max_price)) {

     
     if (isset($brands)) {
        foreach ($brands as $key => $brand) {
         $query->orwhere('price' , '>=' , $min_price)->where('price' , '<=' , $max_price)->where('brandname', '=' , $brand);    
        }
     }
        $query->where('price' , '>=' , $min_price)->where('price' , '<=' , $max_price);
   }
    })->get();

    return view('products.index' ,compact(['products']));

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
        $comments = \App\Comment::all();
        return view('products.detail', compact('comments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('products.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
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
        $product = Product::find($request->id);
        $product->title     = $request->title;
        $product->thumbnail = $filename;
        $product->price     = $request->price;
        $product->size      = $request->size;
        $product->color     = $request->color;
        $product->user_id   = $request->seller;
        $product->brandname = $request->brand;
        $updated            = $product->save();
        if ($updated) {
            return redirect('/products')->with('message', 'Product updated Successfully');
        }

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $deleted = $product->delete();
        if ($deleted) {
            return redirect('/products')->with('message','Product Deleted Successfully');
        }
        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function search(Request $request){
      $searchData = $request->searchData;
    
      //query for search
      $products = Product::where('title','like','%' .$searchData. '%')->get();
      return view('products.index' ,[
          'data' => $products , 
          'Products' => $searchData   
        ]);
    }    

}
