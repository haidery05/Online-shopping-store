@extends('layouts.app')
@section('title' , 'Post New Category')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<br>
				<form action="{{url('/categories')}}" method="POST" class="form-horizontal" role="form" 	enctype="multipart/form-data">

				{{ csrf_field() }}
						<div class="form-group">
							<legend>Post Your Category</legend>
						</div>
						@if(session('message'))
                        <p class="alert alert-success">
                        {{session('message')}}</p>
						@endif
				   <span >Title</span>
				         <div class="form-group">
				         	<input type="text" name="title" id="input" class="form-control" value="" >
				         </div>
				   <span >Upload the picture</span>
				         <div class="form-group">
				         	<input type="file" name="thumbnail" id="thumbnail" class="form-control" value="{{old('thumbnail')}}" >
				         </div>
						<span class="">Price</span>
						<div class="form-group">
							<input name="price" id="price" class="form-control" value="">

						</div>

						<span class="">Size</span>
						<div class="form-group">
							<input name="size" id="price" class="form-control" value="">

						</div>

						<span class="">Color</span>
						<div class="form-group">
							<input name="color" id="price" class="form-control" value="">

						</div>

						<span class="">Product Id:</span>
				         <div class="form-group">
				         	<input type="text" name="product" id="input" class="form-control" value="" >
                         </div>

				         <div class="form-group">
				         	<input type="hidden" name="seller" value="{{Auth::User()->id}}" >				         	

						</div>
				
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>





                        </div>
                </div>
            </div>
        </div>




@endsection