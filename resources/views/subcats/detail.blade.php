@extends('layouts.app')
@section('title','All Posts')
@section('content')


     <div class="conatiner">		
        <div class="row">		
           <div style="margin-left: 200px;" class="col-sm-12">		

             <article>  
               <h2>{{$subcat->title}}<h2>
               @if($subcat->thumbnail)
               <img style="height: 350px; width: 600px;" src="{{ url('/public/images/'.$subcat->thumbnail) }}" alt="{{ $subcat->thumbnail }}" />
               @endif
             </article>
               <p style="width: 500px;">Price is : {{$subcat->price}}</p>
               <p style="width: 500px;">Size is : {{$subcat->size}}</p>
               <p style="width: 500px;">Color is : {{$subcat->color}}</p>
                <p> posted by <a href="{{url('/profile')}}">{{ $subcat->user['name'] }}</a> is a {{ $subcat->user['role'] }}</p>
                <p>{{ $subcat->created_at->diffForHumans()}}</p>

              @if(Auth::User()->id == $subcat->user_id)
               <a class="btn btn-primary" href="{{url('/review')}}">Review it</a>
              @endif
           </div>
        </div>
     </div>



@endsection