<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use stre;
use Auth;   
use Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = \App\User::all();
        return view('users.index',compact('users'));

    }

    public function filter(){

    if (request()->has('gender')) {
       $users = User::where('gender' , request('gender'))->paginate(2)->appends('gender', request('gender')); 
       
    } else {
        $users = User::paginate(2);
    }
     return view('users.index')->with('users', $users);
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

    public function slider(){
        return view('slider');
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

    public function profile(){

        return view('profile',array('user'=> Auth::user()));
    }

    public function update(Request $request){

          if ($request->hasFile('picture')) {
            $picture =$request->file('picture');
            $filename = time(). '.'.$picture->getClientOriginalExtension();
            Image::make($picture)->resize(300,300)->save(public_path('/images/'.$filename));
          $user = Auth::user();
          $user->picture = $filename;
          $user->save();

          }
        return view('profile',array('user'=> Auth::user()) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
