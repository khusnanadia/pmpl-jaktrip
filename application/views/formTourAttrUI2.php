<script src="http://maps.googleapis.com/maps/api/js">

</script>



<script>

var gmarkers = [];

var counter = 0;

var map;



function initialize()

{

var mapProp = {

  center:new google.maps.LatLng(-6.190035, 106.838075),

  zoom:11,

  mapTypeId:google.maps.MapTypeId.ROADMAP

  };



  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  

  var recentLat=document.getElementById('lattitude').value;

  var recentLng=document.getElementById('longitude').value;

  var recentLoc = new google.maps.LatLng(recentLat,recentLng);

  var marker=new google.maps.Marker({

	position:recentLoc,

	map:map

  });

	gmarkers.push(marker);

  google.maps.event.addListener(map, 'click', function(event) {

  counter++;

    gmarkers[counter-1].setMap(null);

	

	placeMarker(event.latLng); 

	

  });

}



function placeMarker(location) {

  

   var marker = new google.maps.Marker({

    position: location,

    map: map,

  });

  gmarkers.push(marker);



  var infowindow = new google.maps.InfoWindow({

    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng() + '<br><button type="button" onclick="addLocation('+location.lng()+', '+location.lat()+')">Add Location</button>'

  });

  

  infowindow.open(map,marker);

}

google.maps.event.addDomListener(window, 'load', initialize);



function addLocation(lng,lat){

 //code....

	document.getElementById('longitude').value=lng;

	document.getElementById('lattitude').value=lat;

}

</script>



			<div class="col-lg-12">

				<!-- if succes

				<div class="col-lg-2"></div>

				<div class="alert alert-dismissible alert-success col-lg-7" style="text-align: center; margin: 15px;">

				<button type="button" class="close" data-dismiss="alert">×</button>

				<strong>Thank you!</strong> You successfully published new places. </div>

				<div class="col-lg-3"></div><br><br><br><br>

				

				if failed

				<div class="col-lg-2"></div>

				<div class="alert alert-dismissible alert-warning col-lg-7" style="text-align: center; margin: 15px;">

				<button type="button" class="close" data-dismiss="alert">×</button>

				<strong>Ooops!</strong> Something went wrong. Please double check the form. </div>

				<div class="col-lg-3"></div><br><br><br><br>

			-->



				<div class="tuffyh2a admintitle">Edit Place</div>



				<?php

				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');

					echo form_open_multipart('ManageTourAttrCtr/myform', $attributes); 

					/*$place_name = $place_name['value'];

					$description = $description['value'];

					$place_info = $place_info['value'];

					$weekday_price = $weekday_price['value'];

					$weekend_price = $weekend_price['value'];

					$cat_name = $cat_name['value'];

					$cat_checked = $cat_checked['value'];

					$city = $city['value'];

					//$pic = $pic['value'];

					//$pic_info = $pic_info['value'];

					$longitude = $longitude['value'];

					$lattitude = $lattitude['value'];

					$halte_name = $halte_name['value'];

					$transport_info = $transport_info['value'];

					$transport_price = $transport_price['value'];

					$author = $author['value'];*/

					

				echo form_hidden('key', $place_name); 

				echo form_hidden('rate_avg', $rate_avg); 

				echo form_hidden('hits', $hits);

				//echo form_hidden('author', $author);

				echo form_hidden('pic', $pic); 

				echo form_hidden('id', $id);

				echo form_hidden('key', $place_name); ?>

				

					

					<div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Title <span class="req">*</span></label>

						<?php echo form_error('place_name'); ?>

  						<input class="form-control" type="text" id="place_name" name="place_name" value="<?php echo $place_name; ?>" required>

				      <br></div>

				    </div>

					<br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Description <span class="req">*</span></label>

						<?php echo form_error('description'); 

						echo form_textarea( array( 'name' => 'description', 'rows' => '3', 'class' => 'form-control', 'value' => $description, 'required' => 'required' ) )."<br>";

						?>

  						 <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Inside Of</label><br>

						<?php echo form_error('place_info'); ?>

   					 	<span class="field custom-dropdown ">						

   					 	<select   class="field form-control" title="Inside Of" id="place_inform" name="place_inform" style="margin-left: -10px; background-color: #f0f0f0 !important;">       					     	

							<option value="" selected disabled>Choose place</option>

   					     	<?php

			                 foreach($lala as $row)

			                 {

								if(strcmp($row->place_name,$place_info)==0){

									echo "<option value='".$place_info."' selected>".$place_info."</option>";

								}

								else{

									echo "<option value='".$row->place_name."'>".$row->place_name."</option>";

								}

			                    

			                 }

			                ?>

   					 	</select>

						<!--<?php //echo form_dropdown('place_info', $place_inf, $place_info)."<br>"; ?>-->

   					 </span><br>

				      <br></div>

				    </div>

				    <br><br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Weekday Price <span class="req">*</span></label>

						<?php echo form_error('weekday_price'); ?>

  						<input class="form-control" type="text" id="weekday_price" name="weekday_price" value="<?php echo $weekday_price; ?>" required>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Weekend Price <span class="req">*</span></label>

						<?php echo form_error('weekend_price'); ?>

  						<input class="form-control" type="text" id="weekend_price" name="weekend_price" value="<?php echo $weekend_price; ?>" required>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Category <span class="req">*</span></label><br>

						<?php echo form_error('category_name'); ?>

  						<?php 	$i=0;

								foreach ($cat_name as $row){

									$cat = $row->category_name;

									echo form_checkbox('category_list[]',$cat, $cat_checked[$i]).($row->category_name)."<br>"; 

									$i++;

								}

								echo '<br>';

								echo form_checkbox('category_list[]','')."Other ".form_input('category_new',set_value('category_new'))."<br>";

						?>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Location <span class="req">*</span></label><br>

						<!--<?php  

						

								//	echo form_dropdown('city',$loc, $city)."<br>"; 

						?>-->

  						<span class="field custom-dropdown ">

   					 	<select   class="field form-control" title="All Location" id="select_location" name="select_location" style="margin-left: -10px; background-color: #f0f0f0 !important;" required>    

   					     	<option value="" selected disabled>All Location</option>

   					     	<?php echo form_error('city');

			                  foreach($query2 as $row)

			                  {

			                  	if(strcmp($row->city,$city)==0){

									echo "<option value='".$city."' selected>".$city."</option>";

								}

								else{

									echo "<option value='".$row->city."'>".$row->city."</option>";

								}

			                  }

			                ?>

   					 	</select>

   					 </span><br>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Photos</label>

  						<input type="file" name="userfile" size="20" multiple>

				      <br></div>

				    </div>

				    <br>

					 <br>

					 <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Photo Credit</label>

						<?php echo form_error('credit'); ?>

  						<input class="form-control" type="text" id="credit" name="credit" value="">

				      <br></div>

				    </div><br>

				    <div class="form-group">

					  <div class="col-lg-11" >

					  	<label class="control-label">Longitude & Lattitude</label>

				

							<div id="googleMap" style="width:500px;height:380px;"></div><br>

						

				      </div><br>

				    </div>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Longitude <span class="req">*</span></label>

						<?php echo form_error('longitude'); ?>

  						<input class="form-control" type="text" id="longitude" name="longitude" value="<?php echo $longitude; ?>" readonly required>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Lattitude <span class="req">*</span></label>

						<?php echo form_error('lattitude'); ?>

  						<input class="form-control" type="text" id="lattitude" name="lattitude" value="<?php echo $lattitude; ?>" readonly required>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Nearest Bus Stop <span class="req">*</span></label><br>

						<?php echo form_error('halte_code'); ?>

  						 <span class="field custom-dropdown " >

						 <!-- <?php //echo form_dropdown('halte_name',$hlt_name, $halte_name)."<br>"; ?>-->

   					 	 <select class="field form-control" id="select_busstop" name="select_busstop" title="Nearest bus stop?" style="background-color: #f0f0f0 !important;" required>    

   							 <option value="" selected disabled>Nearest bus stop?</option>

   					      	<?php

   				    		foreach($query as $row)

			                  {

			                  	if(strcmp($row->halte_name,$halte_name)==0){

									echo "<option value='".$halte_name."' selected>".$halte_name."</option>";

								}

								else{

									echo "<option value='".$row->halte_name."'>".$row->halte_name."</option>";

								}

			                  }  				    		 

   				   			?>

   					 	</select>

   					 </span>

				      <br><br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Transportation Info <span class="req">*</span></label>

						<?php echo form_error('transport_info'); ?>

  						<input class="form-control" type="text" id="transport_info" name="transport_info" value="<?php echo $transport_info; ?>" required>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Transportation Fee <span class="req">*</span></label>

						<?php echo form_error('transport_price'); ?>

  						<input class="form-control" type="text" id="transport_price" name="transport_price" value="<?php echo $transport_price; ?>" required>

				      <br></div>

				    </div>

				    <br>

					<div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Source <span class="req">*</span></label>

						<?php echo form_error('source'); ?>

  						<input class="form-control" type="text" id="source" name="source" value="<?php echo $link_web; ?>" required>

				      <br></div>

				    </div>

					<br>

				  

				    <br><br>



				    <button class="btn btn-warning" type="submit">PUBLISH</button>

				    

				<?php echo form_close(); ?>

			</div>





			

		</div>

	</div>



<?php

	if($this->session->flashdata('form')) {

	  $msg = $this->session->flashdata('form');

	  $message = $msg['message'];

	  //echo "<script>alert('".$message."');</script>";

	  echo "<script>$(document).ready(function(){notif('".$message."');});</script>";

	}

?>