@extends('layouts.app')
@section('title', " HEllo")
@section('content')

<form action="{{URL::current()}}">
	

 <div>
 	<label for="">Price Range</label><br>
 	Minimum Price <input type="text" name="min_price" value="{{Input::get('min_price')}}"><br>
 	Maximum Price <input type="text" name="max_price" value="{{Input::get('max_price')}}"><br>
 </div>

<div>
 
  <?php  
    $brands = Input::has('brands') ? Input::get('brands'): [];
  ?>

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

@endsection