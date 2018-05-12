@extends('layouts.app')
@section('title','All Posts')
@section('content')
     <div class="conatiner">		
        <div class="row">		
           <div style="margin-left: 200px;" class="col-sm-12">		

             <article>  
               <h2>{{$category->title}}<h2>
               @if($category->thumbnail)
               <img style="height: 350px; width: 600px;" src="{{ url('/public/images/'.$category->thumbnail) }}" alt="{{ $category->thumbnail }}" />
               @endif
             </article>
               <p style="width: 500px;">Price is : {{$category->price}}</p>
               <p style="width: 500px;">Size is : {{$category->size}}</p>
               <p style="width: 500px;">Color is : {{$category->color}}</p>
                <p> posted by <a href="{{url('/profile')}}">{{ $category->user['name'] }}</a></p>
                <p>{{ $category->created_at->diffForHumans()}}</p>

           </div>
        </div>
     </div>
@endsection