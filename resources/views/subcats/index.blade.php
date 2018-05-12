@extends('layouts.app')
@section('title','All Products')
@section('content')

     <div class="conatiner">		
        <div class="row">		
       <div style="margin-left: 200px;" class="col-sm-6 col-sm-offset-3">
            @if(session('message'))
            <p class="alert alert-success">	
            {{session('message')}}</p>			
            @endif       	
       </div>

<!-- Filters Code start-->

<form action="{{URL::current()}}" style="margin-left: 200px;" class="col-sm-12">
  

 <div>
  <label for="">Price Range</label><br>
  Minimum Price <input type="text" name="min_price" value="{{Input::get('min_price')}}"><br>
  Maximum Price <input type="text" name="max_price" value="{{Input::get('max_price')}}"><br>
 </div>

<div>
 
  <?php  
    $brands = Input::has('brands') ? Input::get('brands'): [];
  ?>

<!--  @foreach($subcats as $subcat)
    <div class="checkbox">
       <label><input type="checkbox" value="{{ $subcat->brandname }}">{{ $subcat->brandname }}</label>
    </div>
@endforeach  -->

 <label for="">Brands</label>
  <br>
 <input type="checkbox" name="brands[]" value="fauji" {{in_array('fauji', $brands) ? 'checked' : '' }} >Brand One
  <br>  
 <input type="checkbox" name="brands[]" value="Army" {{in_array('Army', $brands) ? 'checked' : '' }} >Brand Two
 <br> 
 <input type="checkbox" name="brands[]" value="" {{in_array(1, $brands) ? 'checked' : '' }} >Brand Five
</div>

<button>Ok</button>
<hr>

<h1>Subcats</h1>

    <ul>
      @foreach($subcats as $subcat)
          <li>Tile: {{ $subcat->title }}  -  Price: {{ $subcat->price }}</li>
      @endforeach
    </ul>

</form>

<!-- Filters Code end-->

           <div style="margin-left: 200px;" class="col-sm-12">		
            @if(count($subcats)>0) 
             @foreach($subcats as $subcat)
             <article>	
               <h2><a href="{{url('/subcats/show/'.$subcat->id)}}">{{$subcat->title}}</a></h2>  
               @if($subcat->thumbnail)
               <a href="{{url('/subcats/show/'.$subcat->id)}}"><img style="height: 200px;" src="{{ url('/public/images/'.$subcat->thumbnail) }}" alt="{{ $subcat->thumbnail }}" /></a>
               @endif
<br><br>      

                <p> {{$subcat->title}} is sub category of {{ $subcat->category->title }}  </p>
                <p>posted by <a href="{{url('/profile/' .$subcat->user['id'])}}"> {{ $subcat->user['name'] }}</a> is a {{ $subcat->user['role'] }}</p>

                <p>{{ $subcat->created_at->diffForHumans()}}</p>

               @if(Auth::User()->id == $subcat->user_id)
               <a class="btn btn-primary" href="{{url('/subcat/'.$subcat->id.'/edit/')}}">Edit</a>
               <a class="btn btn-primary" href="{{url('/subcats/'.$subcat->id.'/delete/')}}">Delete</a>		
               @endif
             </article>
             @endforeach
             @else
             <h1>No Sub Categories Found </h1>
          @endif
           </div>
<br><br>
           <div style="margin-left: 200px;" class="col-sm-12">
           
           </div>
        </div>
     </div>
@endsection