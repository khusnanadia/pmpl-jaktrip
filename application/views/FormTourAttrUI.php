



			<script

src="http://maps.googleapis.com/maps/api/js">

</script>



<script>

var gmarkers = [];

var counter = 0;

var map;



function initialize()

{

var mapProp = {

  center: new google.maps.LatLng(-6.190035, 106.838075),

  zoom:11,

  mapTypeId:google.maps.MapTypeId.ROADMAP

  };



  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);



  google.maps.event.addListener(map, 'click', function(event) {

   // map.setMap(null);

    if(counter!=0)

       gmarkers[counter-1].setMap(null);

    counter++;

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



				<div class="tuffyh2a admintitle">Add New Place</div>



				<?php

				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');

				echo form_open_multipart('TourAttrCtr/myform', $attributes); ?>

		

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

  						<textarea class="form-control" rows="3" id="textArea" id="description" name="description" value="<?php echo $description; ?>" required></textarea>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Inside Of</label><br>

   					 	<span class="field custom-dropdown ">

   					 	<select   class="field form-control" title="Inside Of" id="place_inform" name="place_inform" style="margin-left: -10px; background-color: #f0f0f0 !important;">    

   					     	<option value="" selected disabled>Choose a place..</option>

   					     	<?php

			                  foreach($place as $row)

			                  {

			                    echo "<option value='".$row->place_name."'>".$row->place_name."</option>";

			                  }

			                ?>

   					 	</select>

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

  						<?php foreach ($cat_name as $row){

							echo form_checkbox('category_list[]',$row->category_name).($row->category_name)."<br>"; 

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

  						<span class="field custom-dropdown ">

   					 	<select   class="field form-control" title="All Location" id="select_location" name="select_location" style="background-color: #f0f0f0 !important; margin-left: -10px;" required>    

   					     	<option value="" selected disabled>All Location</option>

   					     	<?php

			                  foreach($query2 as $row)

			                  {

			                    echo "<option value='".$row->city."'>".$row->city."</option>";

			                  }

			                ?>

   					 	</select>

   					 </span><br>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Photos<span class="req">*</span></label>

  						<input type="file" name="userfile" size="20" multiple required>

				      <br></div>

				    </div>

				    <br>

				     <br>

				      <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Photo Credit<span class="req">*</span></label>

						<?php echo form_error('credit'); ?>

  						<input class="form-control" type="text" id="credit" name="credit" value="<?php echo $credit; ?>"required>

				      <br></div>

				    </div><br>

				    <div class="form-group">

					  <div class="col-lg-11">

					  	<label class="control-label">Longitude & Lattitude</label>

						<div id="googleMap" style="width:500px;height:380px;"></div><br>

				      </div><br>

				    </div>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Longitude <span class="req">*</span></label>

  						<input class="form-control" type="text" id="longitude" name="longitude" value="<?php echo $longitude; ?>" readonly quired>

				      <br></div>

				    </div>

				    <br>

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Lattitude <span class="req">*</span></label>

  						<input class="form-control" type="text" id="lattitude" name="lattitude" value="<?php echo $lattitude; ?>" readonly required>

				      <br></div>

				    </div>

				   

				    

				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Nearest Bus Stop <span class="req">*</span></label><br>

  						 <span class="field custom-dropdown " >

   					 	<select class="field form-control" id="select_busstop" name="select_busstop"title="Nearest bus stop?" style="background-color: #f0f0f0 !important; margin-left: -10px;" required>    

   							 <option value="" selected disabled>Nearest bus stop?</option>

   					      	<?php

   				    		foreach ($query as $row) {

									echo "<option value='".$row->halte_name."'>".$row->halte_name."</option>";

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