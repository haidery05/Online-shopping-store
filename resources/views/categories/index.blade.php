@extends('layouts.app')
@section('title','All Products')
@section('content')
     <div class="conatiner">		
        <div class="row">		
       <div style="margin-left: 200px>
     <div class="conatiner">    
       <div class="row">   
     
       <div style="margin-left: 200px;" class="col-sm-6 col-sm-offset-3">
            @if(session('message'))
            <p class="alert alert-success"> 
            {{session('message')}}</p>      
            @endif        
       </div>

           <div style="margin-left: 200px;" class="col-sm-12">    
            @if(count($categories)>0) 
             @foreach($categories as $category)
             <article>  
               <h2><a href="{{url('/categories/show/'.$category->id)}}">{{$category->title}}</a></h2>  
               @if($category->thumbnail)
               <a href="{{url('/categories/show/'.$category->id)}}"><img style="height: 200px;" src="{{ url('/public/images/'.$category->thumbnail) }}" alt="{{ $category->thumbnail }}" /></a>
               @endif
<br><br>      
      <p>{{ $category->title }} is category of {{ $category->product['title'] }}</p>

                <p> posted by <a href="{{url('/profile/' .$category->user['id'])}}"> {{ $category->user['name'] }}</a></p> <p>{{ $category->created_at->diffForHumans()}}</p>


            @if(Auth::User()->id == $category->user_id)
               <a class="btn btn-primary" href="{{url('/categories/'.$category->id.'/edit/')}}">Edit</a>
               <a class="btn btn-primary" href="{{url('/categories/'.$category->id.'/delete/')}}">Delete</a>
            @endif   
             </article>
             @endforeach
             @else
             <h1>No Category Found </h1>
          @endif
           </div>
<br><br>
           <div style="margin-left: 200px;" class="col-sm-12">
           
           </div>
        </div>
     </div>
@endsection