@extends('layouts.app')
@section('title','Update Sub Category')
@section('content')
     <div class="conatiner">		
        <div class="row">		
           <div class="col-sm-6 col-sm-offset-3">		

            <form action="{{ url('/categories/update') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                  <legend>Edit Post:  {{$category->title}}</legend>
                </div>
            @if(session('message'))
            <p class="alert alert-success"> 
            {{session('message')}}</p>      
            @endif 

            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$category->id}}" />
            <input type="hidden" value="{{ $category->thumbnail }}" name="image">
                <div class="form-group">
                <span for="inputTitle">Title:</span>
                  <input type="text" name="title" id="inputTitle" class="form-control" value="{{ $category->title }}" >
                </div>
            <span >Upload the picture</span>
                 <div class="form-group">
                  <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                 </div>
            <span class="">Price</span>
            <div class="form-group">
              <input name="price" id="price" class="form-control" value="{{ $category->price }}">

            </div>

            <span class="">Size</span>
            <div class="form-group">
              <input name="size" id="price" class="form-control" value="{{ $category->size }}">

            </div>

            <span class="">Color</span>
            <div class="form-group">
              <input name="color" id="price" class="form-control" value="{{ $category->color }}">

            </div>

                  <span >Product Id</span>
                 <div class="form-group">
                  <input type="text" name="seller" id="input" class="form-control" value="{{ $category->product_id }}" >

            </div>

                  <span >User Id</span>
                 <div class="form-group">
                  <input type="text" name="user" id="input" class="form-control" value="{{ $category->user_id }}" >

            </div>            
            
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
     
                </div>
            </form>

           </div>
        </div>
     </div>
@endsection