@extends('layouts.app')
@section('title' , 'Post New Category')
@section('content')

	
   <center>
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


</center>

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

           var sub_cat_id=$(this).val();
          // console.log(cat_id);

           var div=$(this).parent();

           var op= " ";

          $.ajax({
               type:'get',
               url:'{!!URL::to('findSubcatName')!!}',
               data:{'id':sub_cat_id},
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

          var a= $(this).parent();
          console.log(prod_id);
          var op= "";
     });

   });


//_____SubCats_end_____


</script>



@endsection