  @extends('layouts.app')
@section('title', "| $product->title")
@section('content')
     <div class="conatiner">		
        <div class="row">		
           <div style="margin-left: 200px;" class="col-md-8 col-md-offset-2">		

             <article>  
               <h2>{{$product->title}}<h2>
               @if($product->thumbnail)
               <img style="height: 350px; width: 600px;" src="{{ url('/public/images/'.$product->thumbnail) }}" alt="{{ $product->thumbnail }}" />
               @endif
             </article>
               <p style="width: 500px;">Price is : {{$product->price}}</p>
               <p style="width: 500px;">Size is : {{$product->size}}</p>
               <p style="width: 500px;">Color is : {{$product->color}}</p>
               <p style="width: 500px;">Brand is : {{$product->brandname}}</p>
                <p> posted by <a href="{{url('/profile')}}">{{ $product->user['name'] }}</a> is a {{ $product->user['role'] }}</p>
                <p>{{ $product->created_at->diffForHumans() }}</p>





                <hr>
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <form action="{{url('/products/show/'.$product->id)}}" method="POST" class="form-horizontal" role="form">
                     {{ csrf_field() }}                    
                      <div class="form-group">
                        <input type="text" name="body" placeholder="Your Comments here" class="form-control">
                        
                      </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary">Add Comment</button>
                        
                      </div>
                    </form>
                    
                  </div>
                </div>


           </div>

        </div>



     </div>
@endsection