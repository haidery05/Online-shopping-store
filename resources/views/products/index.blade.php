@extends('layouts.app')
@section('title','All Products')
@section('content')
@include('search',['url'=>'products','link'=>'products'])


     <div class="conatiner">		
        <div class="row">		
       <div style="margin-left: 200px;" class="col-sm-6 col-sm-offset-3">
            @if(session('message'))
            <p class="alert alert-success">	
            {{session('message')}}</p>			
            @endif       	
       </div>


    <div class="panel panel-default">

{!! Form::open(['method'=>'GET','url'=>'products','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<a href="{{ url('products/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>

<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"--></i>
        </button>
    </span>
</div>
{!! Form::close() !!}
    

    </div>

@include('products.range')


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

<!--  @foreach($products as $product)
    <div class="checkbox">
       <label><input type="checkbox" value="{{ $product->brandname }}">{{ $product->brandname }}</label>
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

<h1>Products</h1>

    <ul>
      @foreach($products as $product)
          <li>Tile: {{ $product->title }}  -  Price: {{ $product->price }}  -  Brand: {{ $product->brandname }}</li>
      @endforeach
    </ul>

</form>

<!-- Filters Code end-->


           <div style="margin-left: 200px;" class="col-sm-12">		
            @if(count($products)>0) 
             @foreach($products as $product)
             <article>	
               <h2><a href="{{url('/products/show/'.$product->id)}}">{{$product->title}}</a></h2>  
               @if($product->thumbnail)
               <a href="{{url('/products/show/'.$product->id)}}"><img style="height: 200px;" src="{{ url('/public/images/'.$product->thumbnail) }}" alt="{{ $product->thumbnail }}" /></a>
               @endif
               <p style="width: 500px;">Price is :{{$product->price}}</p>
 
                <p> posted by <a href="{{url('/profile/' .$product->user['id'])}}">{{ $product->user['name'] }}</a> is a {{ $product->user['role'] }}</p>
                <p>{{ $product->created_at->diffForHumans()}}</p>

               @if(Auth::User()->id == $product->user_id)
                    <a class="btn btn-primary" href="{{url('/products/'.$product->id.'/edit/')}}">Edit</a>
                    <a class="btn btn-primary" href="{{url('/products/'.$product->id.'/delete/')}}">Delete</a>
               @endif		
            
             </article>

             @endforeach
             @else
             <h1>No Products Found </h1>
          @endif
           </div>
<br><br>
           <div style="margin-left: 200px;" class="col-sm-12">
           
           </div>
        </div>
     </div>
@endsection