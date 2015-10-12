<!--
author: Khusna Nadia

Menampilkan form isian membuat promo baru di halaman admin
-->

<div class="col-lg-12">
	<div class="tuffyh2a admintitle">Add New Promo</div>

	<?php
		$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');
		echo form_open_multipart('AddPromoCtr/myForm', $attributes);
	?>

	<div class="form-group">
	  <div class="col-lg-11">
		<label class="control-label">Title <span class="req">*</span></label>
		<?php echo form_error('title'); ?>
		<input class="form-control" type="text" id="title" name="title" value="<?php echo $title; ?>" required pattern="[a-zA-Z0-9%.-\s]+" maxlength=160 title="Title can't contain any of the following characters : ! @ # $ % ^ & * &quot; &apos; ">
	  <br></div>
	</div>
	<br>

	<div class="form-group">
	  <div class="col-lg-11">
		<label class="control-label">Start Date <span class="req">*</span></label>
		<input class="form-control field datepicker" type="text" name="start_date" id="start_date"  value="<?php echo $start_date; ?>" style="background-color: #f0f0f0 !important;" required>
      <br></div>
    </div>
	<br>

	<div class="form-group">
	  <div class="col-lg-11">
		<label class="control-label">End Date <span class="req">*</span></label>
		<input class="form-control field datepicker" type="text" name="end_date" id="end_date"  value="<?php echo $end_date; ?>" style="background-color: #f0f0f0 !important;" required>
      <br></div>
    </div>
	<br>

	<div class="form-group">
	  <div class="col-lg-11">
		<label class="control-label">Place <span class="req">*</span></label><br>
		<?php echo form_error('place_name'); ?> 
	 	<span class="field custom-dropdown ">
		 	<select class="field form-control" id="place_name" name="place_name" style="margin-left: -10px; background-color: #f0f0f0 !important;" required>    
		     	<!-- <option value="" selected disabled>Choose a place..</option> -->
		     	<?php
                  for($index=-1; $index<count($place); $index++){
                  	$row = $place[$index];
                  	if($place_name=='' && $index==-1){
                  		echo "<option value='' selected disabled>Choose a place..</option>";
                  	}
                  	else if($row->place_name==$place_name){
                  		echo "<option value='".$row->place_name."' selected>".$row->place_name."</option>";
                  	}
                  	else{
                    	echo "<option value='".$row->place_name."'>".$row->place_name."</option>";
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
		<label class="control-label">Description</label>
		<?php echo form_error('description'); ?>
		<textarea class="form-control" rows="3" id="textArea" id="description" name="description" value=""><?php echo $description; ?></textarea>
      <br></div>
    </div>
    <br>
				    
	<div class="form-group">
	  <div class="col-lg-11">
		<label class="control-label">Type of Promo <span class="req">*</span></label><br>
		<?php echo form_error('type_list'); ?>
		<?php
			foreach ($typepromo_name as $row){
				echo form_checkbox('type_list[]',$row->type_name).($row->type_name)."<br>";
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
		<input type="file" name="userfile" size="20" enctype="multipart/form-data" required>
      <br></div>
    </div>
    <br>

    <br><br>

    <button class="btn btn-warning" type="submit">PUBLISH</button>

	<?php echo form_close(); ?>
</div>

<!--close header-->		
</div>
</div>

<?php
	if($this->session->flashdata('form')) {
	  $msg = $this->session->flashdata('form');
	  $message = $msg['message'];
	  echo "<script>$(document).ready(function(){notif('".$message."');});</script>";
	}
?>