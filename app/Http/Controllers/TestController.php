<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use App\Subcat;

class TestController extends Controller
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

    public function prodfunct(){
        $prod = \App\Product::all();
        return view('subcats.create', compact('prod'));
    }

    public function findProductName(Request $request){
        $data = \App\Category::select('title','id')->where('product_id',$request->id)->take(100)->get();
        return response()->json($data);
    }


    public function findPrice(Request $request){
       $p = \App\Category::select('user_id')->where('id', $request->id)->first();
       return response()->json($p);

}

    public function catfunct(){
        $cat = \App\Category::all();
        return view('subcats.create', compact('cat'));
    }

    public function findSubcatName(Request $request){
        $data = \App\Subcat::select('title','id')->where('category_id',$request->id)->take(100)->get();
        return response()->json($data);
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

    public function subcatfilter(){
    $subcats = Subcat::where(function($query){

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

    return view('subcats.index' ,compact(['subcats']));

    }



    public function store(Request $request)
    {
        //
        $comments = \App\Comment::all();
        return view('products.detail', compact('comments'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
