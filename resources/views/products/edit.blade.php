@extends('layouts.app')
@section('title','Update your Products')
@section('content')
     <div class="conatiner">		
        <div class="row">		
           <div class="col-sm-6 col-sm-offset-3">		

            <form action="{{ url('/products/update') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                  <legend>Edit Post:  {{$product->title}}</legend>
                </div>
            @if(session('message'))
            <p class="alert alert-success"> 
            {{session('message')}}</p>      
            @endif 

            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$product->id}}" />
            <input type="hidden" value="{{ $product->thumbnail }}" name="image">
                <div class="form-group">
                <span for="inputTitle">Title:</span>
                  <input type="text" name="title" id="inputTitle" class="form-control" value="{{ $product->title }}" >
                </div>
            <span >Upload the picture</span>
                 <div class="form-group">
                  <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                 </div>
            <span class="">Price</span>
            <div class="form-group">
              <input name="price" id="price" class="form-control" value="{{ $product->price }}">

            </div>

            <span class="">Size</span>
            <div class="form-group">
              <input name="size" id="price" class="form-control" value="{{ $product->size }}">

            </div>

            <span class="">Color</span>
            <div class="form-group">
              <input name="color" id="price" class="form-control" value="{{ $product->color }}">

            </div>

                  <span >User Id</span>
                 <div class="form-group">
                  <input type="text" name="seller" id="input" class="form-control" value="{{ $product->user_id }}" >

            </div>
            
            <span class="">Brand</span>
            <div class="form-group">
              <input name="brand" id="price" class="form-control" value="{{ $product->brandname }}">
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