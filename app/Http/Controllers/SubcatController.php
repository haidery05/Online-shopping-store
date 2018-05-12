<?php

namespace App\Http\Controllers;

use App\Subcat;
use Illuminate\Http\Request;

class SubcatController extends Controller
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

        $subcats = \App\Subcat::all();
        return view('subcats.index',compact('subcats'));
    }


        public function save(Request  $request){
         if ($request->hasFile('thumbnail') && $request->thumbnail->isValid()) {
             $extension = $request->thumbnail->extension();
             $filename = time()."_.".$extension;
             $request->thumbnail->move(public_path('images'), $filename);
         }else{
            $filename = 'no_image.png';
         }


         $created = Subcat::create([
            'title'    =>$request ->title,
            'thumbnail'=>$filename,
            'price'    =>$request->price,
            'size'     =>$request->size,
            'color'    =>$request->color,
            'category_id'=>$request->product,
            'user_id' =>$request->user
            ]);
         if ($created) {
            return redirect('/subcats/create')->with('message','Sub Category Added Successfully');
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
      return view('subcats.create');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $subcat = Subcat::find($id);
        return view('subcats.detail', compact('subcat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subcat = Subcat::find($id);
        return view('subcats.edit' , compact('subcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcat  $subcat
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
        $subcat = Subcat::find($request->id);
        $subcat->title        = $request->title;
        $subcat->thumbnail    = $filename;
        $subcat->price        = $request->price;
        $subcat->size         = $request->size;
        $subcat->color        = $request->color;
        $subcat->category_id  = $request->seller;
        $subcat->user_id      = $request->user;
        $updated              = $subcat->save();
        if ($updated) {
            return redirect('/subcats')->with('message', 'Sub Category updated Successfully');
        }

    }

    public function delete($id)
    {
        $subcat = Subcat::find($id);
        $deleted = $subcat->delete();
        if ($deleted) {
            return redirect('/products/categories/subcats')->with('message','Sub Category Deleted Successfully');
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcat $subcat)
    {
        //
    }

//AJAX Functions

    public function prodfunct(){
        $prod = \App\Product::all();
        return view('subcats.create', compact('prod'));
    }

    public function findProductName(Request $request){
        $data = \App\Category::select('title','id')->where('product_id',$request->id)->take(100)->get();
        return response()->json($data);
    }


    public function findPrice(Request $request){
       $p = \App\Subcat::select('user_id')->where('id', $request->id)->first();
       return response()->json($p);

}

    public function catfunct(){
        $cat = \App\Category::all();
        return view('productlist', compact('cat'));
    }

    public function findSubcatName(Request $request){
        $data = \App\Subcat::select('title','id')->where('category_id',$request->id)->take(100)->get();
        return response()->json($data);
    }

}
