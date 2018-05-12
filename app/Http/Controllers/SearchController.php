<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class SearchController extends Controller
{
    public function index()
    {
    $search = \Request::get('search'); //<-- we use global request to get the param of URI

    $products = Product::where('title','like','%'.$search.'%')
        ->orderBy('title')
        ->paginate(20);

    return view('products.index',compact('products'));
    }


    public function filter(Request $request, User $user)
    {
     // Search for a user based on their price.
    if ($request->has('price')) {
        return $user->where('price', $request->input('price'))->get();
    }

    // Search for a user based on their gender.
    if ($request->has('gender')) {
        return $user->where('gender', $request->input('gender'))
            ->get();
    }    

    // Search for a user based on their city.
    if ($request->has('role')) {
        return $user->where('role', $request->input('role'))->get();
    }
    // Continue for all of the filters.

    // No filters have been provided, so
    // let's return all users. This is
    // bad - we should paginate in
    // reality.
    return Product::all();
     
    }

}