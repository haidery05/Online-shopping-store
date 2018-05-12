@extends('layouts.app')
@section('title' , 'Post New Product')
@section('content')

<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajaxdbdropdown.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>



	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<br>
				<form action="{{url('/products')}}" method="POST" class="form-horizontal" role="form" 	enctype="multipart/form-data">

				{{ csrf_field() }}
						<div class="form-group">
							<legend>Post Your Product</legend>
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
						<span class="">Brand</span>
						<div class="form-group">
							<input name="brand" id="price" class="form-control" value="">

						</div>
				         	<input type="hidden" name="seller" value="{{Auth::User()->id}}" >



<p><b>Seleect your desired Product</b></p>

<table>
<tr>
<td>Country: 
<select name="country" onchange="showHint(this.value)">
	<option value="p">Punjab</option>
	<option value="s">Sindh</option>
	<option value="b">Balochistan</option>
	<option value="k">KPK</option>	
</select>


</td>
<td>
<span id="txtHint"></span>
</td>
</tr>
</table>






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