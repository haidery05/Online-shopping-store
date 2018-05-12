<?php

namespace App\Http\Controllers;

use App\SubcatReview;
use Illuminate\Http\Request;
use Auth;
use App\SubCat;

class SubcatReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('subcats.review');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $reviews = SubcatReview::create([
        'user_id' => Auth::User()->id,
        'rating' => request('rating'),
        'headline' => request('headline'),
        'description' => request('description'),
        'subcat_id' =>  $subcat->id
            ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubcatReview  $subcatReview
     * @return \Illuminate\Http\Response
     */
    public function show(SubcatReview $subcatReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubcatReview  $subcatReview
     * @return \Illuminate\Http\Response
     */
    public function edit(SubcatReview $subcatReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubcatReview  $subcatReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubcatReview $subcatReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubcatReview  $subcatReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubcatReview $subcatReview)
    {
        //
    }
}
