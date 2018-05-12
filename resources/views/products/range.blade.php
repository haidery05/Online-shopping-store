<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Range slider</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        
        $( "#amount_start" ).val( ui.values[ 0 ]);
        $( "#amount_end" ).val( ui.values[ 1 ]);
      }
    });

  //  $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    //  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>
</head>
<body>
 
<p>
  <label for="amount">Price range:</label>
  <input type="text" id="amount_start" name="start_price" />
  <input type="text" id="amount_end" name="end_price"/>
</p>
 
<div id="slider-range"></div>
 
<button onclick="send()">Click</button>

<div id="showDiv"> 
  <div id="showPrice">
    
  </div>
</div>

<script>  
   function send(){

    var start = $('#amount_start').val();
    var end = $('#amount_end').val();

    $.ajax({
       method:"get",
       url: 'sliderpost.blade.php',
       data: "start=" +start,
       
       beforeSend: function(){
        $('#showPrice').show('fast');
       },

       complete: function(){
        $('#showPrice').hide('fast');
       },

       success: function(html){
         $('#showDiv').show('slow');
         $('#showDiv').html(html);
       }
    });
   }
</script> 


</body>
</html>
