<!DOCTYPE html>
<html>
 <head>
  <title>Multiselect Dropdown With Checkbox In Php - XpertPhp</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
 <body>
  <div class="container">
   <h2 align="center">Multiselect Dropdown With Checkbox In Php</h2>
   <form method="post" id="cars_form" name="cars_form">
    <div class="col-md-3">
    </div>
	<div class="col-md-7">	
		<div class="form-group">
		 <label>Select Cars:</label><br/>
		 <?php
				$cars = array (
				  array("id"=>1,"name"=>"Volvo"),
				  array("id"=>2,"name"=>"BMW"),
				  array("id"=>3,"name"=>"Saab"),
				  array("id"=>4,"name"=>"Land Rover"),
				  array("id"=>5,"name"=>"Skoda"),
				  array("id"=>6,"name"=>"Rolls Royce"),
				  array("id"=>7,"name"=>"Audi")
				);
		 ?>
		 <select id="cars" name="cars[]" multiple class="form-control" >
		 <?php foreach($cars as $val){?>
			<option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
		 <?php } ?>
		 </select>
		</div>
		<div class="form-group">
		 <input type="submit" class="btn btn-info" name="submit" value="Submit" />
		</div>
	</div>
   </form>
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('#cars').multiselect({
  nonSelectedText: 'Select Cars',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 $('#cars_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#cars option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#cars').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>