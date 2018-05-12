@extends('layouts.app')
@section('title','All Posts')
@section('content')

<div>
	<div class="reveal" id="product-review-model" data-reveal>
	  <div>
	  	
	  	<form action="{{ route('review.store') }}" method="post" role="form">

        {{csrf_field()}}

	  	<legend>Form Title</legend>
	  		
	  		<div class="form-group">
	  			<label for="">Rate it</label>
	  			<input type="text" class="form-control" name="rating" id="" placeholder="Input.....">
	  		</div>

	  		<div class="form-group">
	  			<label for="">Headline</label>
	  			<input type="text" class="form-control" name="headline" id="" placeholder="Input.....">
	  		</div>

	  		<div class="form-group">
	  			<label for="">Tell Us More</label>
	  			<input type="text" class="form-control" name="description" id="" placeholder="Input.....">
	  		</div>

            <div>
              <input type="hidden" name="subcat_id" value="">	
            </div>

            <button type="submit" class="submit">Submit</button>

	  	</form>
	  </div>
		<button class="close-button" data-close aria-label="Close modal" type="button">
			<span aria-hidden="true"></span>
		</button>

	</div>
</div>

@endsection