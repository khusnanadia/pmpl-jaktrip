<!--

author: Khusna Nadia



Menampilkan form isian mengubah promo di halaman admin

-->



<div class="col-lg-12">

	<div class="tuffyh2a admintitle">Edit Promo</div>

		<?php

		$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');

		echo form_open_multipart('ManagePromoCtr/myForm', $attributes);

		$title = $title['value'];

		$start_date = $start_date['value'];

		$end_date = $end_date['value'];

		$place_name = $place_name['value'];

		$description = $description['value'];

		$type_name = $type_nam;

		$type_checked = $type_checked['value'];

		$photo = $photoPromo;

		$key1 = $id_promo;



		echo form_hidden('key', $id_promo);

		?>

		

		<div class="form-group">

		  <div class="col-lg-11">

			<label class="control-label">Title <span class="req">*</span></label>

			<?php echo form_error('title'); ?>

  				<input class="form-control" type="text" id="title" name="title" value="<?php echo $title; ?>" required pattern="[a-zA-Z0-9%.-\s]+" maxlength=160 title="Title can't contain any of the following characters : ! @ # $ ^ & * &quot; &apos; ">

		      <br></div>

		    </div>

			<br>

		<div class="form-group">

		  <div class="col-lg-11">

			<label class="control-label">Start Date <span class="req">*</span></label>

			<input class="form-control field datepicker" type="text" name="datepicker[]" id="start_date"  value="<?php echo $start_date; ?>" style="background-color: #f0f0f0 !important;" required>

			 <br></div>

	    </div>

		<br>

		<div class="form-group">

		  <div class="col-lg-11">

			<label class="control-label">End Date <span class="req">*</span></label>

			<input class="form-control field datepicker" type="text" name="datepicker[]" id="end_date"  value="<?php echo $end_date; ?>" style="background-color: #f0f0f0 !important;" required>

  			 <br></div>

		   </div>

	    <br>

	    <div class="form-group">

		  <div class="col-lg-11">

			<label class="control-label">Place Name </label><br>

			<?php echo form_error('place_name'); ?>

   		 	<span class="field custom-dropdown ">						

	   		  <select class="field form-control" title="place_name" id="place_name" name="place_name" style="margin-left: -10px; background-color: #f0f0f0 !important;" required>       					     	

				  <option value="" selected disabled>Choose place</option>

	   	     		<?php

		            foreach($lala as $row){

						if(strcmp($row->place_name,$place_name)==0){

							echo "<option value='".$place_name."' selected>".$place_name."</option>";

						}else{

							echo "<option value='".$row->place_name."'>".$row->place_name."</option>";

						}

			        }

		        	?>

	   		  </select>

   			</span><br>

	     <br></div>

	    </div>

	    <br><br>

	    <div class="form-group">

		  <div class="col-lg-11">

			<label class="control-label">Description</label>

			<?php echo form_error('description'); 

			echo form_textarea(array('name' => 'description', 'rows' => '3', 'class' => 'form-control', 'value' => $description) )."<br>";

			?>

  		  <br></div>

	    </div>

	    <br>

	    <div class="form-group">

		  <div class="col-lg-11">

			<label class="control-label">Type of Promo <span class="req">*</span></label><br>

			<?php echo form_error('type_list'); ?>

 			<?php $i=0;

				foreach ($type_nam as $row){

					$type = $row->type_name;

					echo form_checkbox('type_list[]', $type, $type_checked[$i]).($row->type_name)."<br>"; 

					$i++;

				}

				echo '<br>';

				echo form_checkbox('type_list[]','')."Other ".form_input('type_new',set_value('type_new'))."<br>";

			?>

	      <br></div>

	    </div>

	    <br>

	    <div class="form-group">

		  <div class="col-lg-11"> <br>

			<label class="control-label">Photos <span class="req">*</span></label>

			<?php echo form_error('userfile'); ?>

  			<input type="file" name="userfile" size="20" enctype="multipart/form-data">

  			<?php echo "<a href='".base_url($photo)."' data-lightbox='".$key1."'>";

			echo "<div class='pic-thumbnail white'><img src='".base_url($photo)."'></div></a>";

			?>

	      <br></div>

	    </div>

	    <br>

	 	<br><br>

		    <button class="btn btn-warning" type="submit">PUBLISH</button>

			<?php echo form_close(); ?>

		</div>

	</div>

</div>

