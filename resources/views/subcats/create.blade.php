@extends('layouts.app')
@section('title' , 'Post New Category')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<br>

				<form action="{{url('/subcats')}}" method="POST" class="form-horizontal" role="form" 	enctype="multipart/form-data">

				{{ csrf_field() }}


   	<h1>Select your Desired Products</h1>
   
 
  <span>Products :</span>
    <select style="width: 200px;" class="productcategory" id="product_id">
    	<option value="0" disabled="true">--Select--</option>
         @foreach($prod as $cat)
         <option value="{{$cat->id}}">{{$cat['title']}}</option>
        

         @endforeach

    </select>

      <span>Category Name:</span>
    <select style="width: 200px;" class="category">
    	<option value="0" disabled="true" selected="true">Category Name</option>
    </select>

      <span>Sub Category Name:</span>
    <select style="width: 200px;" class="sub_category">
    	<option value="0" disabled="true" selected="true">Sub Category Name</option>
    </select>




						<div class="form-group">
							<legend>Post Your Sub Category</legend>
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
                 		<span class="">Category Id</span>
						<div class="form-group">
                    		 <input type="text" name="product" id="input" class="subcat" value="" >
                        </div>
				         <div class="form-group">
				         	<input type="hidden" name="user" id="input" class="form-control" value="{{Auth::User()->id}}" >				         	

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

				
<!--        Ajax Starts         -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
<script type="text/javascript">

   $(document).ready(function(){

     $(document).on('change' , '.productcategory' , function(){
          // console.log("Its Right");

           var cat_id=$(this).val();
          // console.log(cat_id);

           var div=$(this).parent();

           var op= " ";

          $.ajax({
               type:'get',
               url:'{!!URL::to('findProductName')!!}',
               data:{'id':cat_id},
               success:function(data){
                  //console.log('success');

                  //console.log(data);

                  //console.log(data.length);
                  op+='<option value="0" selected disabled>Choose Category</option>';
                  for(var i=0; i<data.length;i++){
                  	op+='<option value="'+data[i].id+'">'+data[i].title+'</option>';
                  }

                   div.find('.category').html(" ");
                   div.find('.category').append(op);


               },
                error:function(){

                }
          });
     });

     $(document).on('change','.category',function() {
          var prod_id= $(this).val();

          var a= $(this).parent();
          console.log(prod_id);
          var op= "";
     });

   });	


//_____SubCats_start_____

   $(document).ready(function(){

     $(document).on('change' , '.category' , function(){
          // console.log("Its Right");

           var cat_id=$(this).val();
          // console.log(cat_id);

           var div=$(this).parent();

           var op= " ";

          $.ajax({
               type:'get',
               url:'{!!URL::to('findSubcatName')!!}',
               data:{'id':cat_id},
               success:function(data){
                  //console.log('success');

                  //console.log(data);

                  //console.log(data.length);
                  op+='<option value="0" selected disabled>Choose Category</option>';
                  for(var i=0; i<data.length;i++){
                  	op+='<option value="'+data[i].id+'">'+data[i].title+'</option>';
                  }

                   div.find('.sub_category').html(" ");
                   div.find('.sub_category').append(op);


               },
                error:function(){

                }
          });
     });

     $(document).on('change','.sub_category',function() {
          var prod_id= $(this).val();

          var a=$(this).parent();
          console.log(prod_id);
          var op= " ";


              $.ajax({
               type:'get',
               url:'{!!URL::to('findPrice')!!}',
               data:{'id':prod_id},
               dataType:'json',
               success:function(data){
                   console.log('product_id');
                   console.log(data.user_id);
                 
                   a.find('.subcat').val(data.user_id);

               },
                error:function(){

                }
          });


     });

   });


//_____SubCats_end_____


</script>

<!--        Ajax Ends           -->



@endsection