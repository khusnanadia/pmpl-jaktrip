<div class="container">

	<div class="row" style="margin-top: 100px;">



			<div class="col-lg-12">



				<div class="tuffyh2a admintitle">Edit Profile</div>

				<?php

				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');

				echo form_open_multipart('UsersCtr/editMember', $attributes); 

				echo form_hidden('old_password', $password);

				echo form_hidden('pic', $pic); ?>

				<?php if($pic!=base_url('assets/img/avadefault.png')){

					echo "<div class='pic-thumbnail'><img src=".$pic." style='margin: 0px;'></div>

				<br><br>

				<button class='btn btn-warning' name='form_profile' value='remove_photo'>Remove Photo</button>";

				}

				?>

				

					<div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Name <span class="req">*</span></label>

  						<input class="form-control" type="text" value="<?php echo $name; ?>" id="name" name="name" required>

				      <br></div>

				    </div>

					<br>



					<div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Username <span class="req">*</span></label>

  						<input class="form-control" type="text" value="<?php echo $username; ?>" id="username" name="username" readonly>

				      <br></div>

				    </div>

					<br>



					<div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">E-mail <span class="req">*</span></label>

						<?php  

						if(isset($_COOKIE["photo_facebook"]))

              			{

              				$type = "text";

              			}

              			else

              			{

              				$type = "email";

              			}

              			?>

  						<input class="form-control" type="<?php echo $type;?>"  value="<?php echo $email; ?>" id="email" name="email" readonly required>

				      <br></div>

				    </div>

					<br>



					<div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Password</label>

  						<input class="form-control" type="password" value="" id="new_password" name="new_password" placeholder="Fill in this field to change password">

				      <br></div>

				    </div>

					<br>

					

					<div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Password Confirmation</label>

  						<input class="form-control" type="password" value="" id="pass_confirm" name="pass_confirm">

						<?php echo form_error('pass_confirm'); ?>

				      <br></div>

				    </div>

					<br>



				    <div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Bio</label>

						<?php echo form_textarea( array( 'name' => 'description', 'rows' => '3', 'maxlength' => '140', 'title' => 'Maximum length is 140 characters.', 'class' => 'form-control', 'value' => $description) );?>

					  <br></div>

				    </div>

				    <br>

					

					<div class="form-group">

					  <div class="col-lg-11">

						<label class="control-label">Photo</label>

  						<input id="submitPhotoEditProfile" type="file" name="userfile" size="20">

				      <br></div>

				    </div>

					<br>

					

				    

					<br><br>

				    <button id="tombolSubmitPhotoEditProfile" class="btn btn-warning" type="submit" name="form_profile" value="edit">SUBMIT</button>

				    <button class="btn btn-primary" type="submit" name="form_profile" value="delete" onclick ="return confirm('Are you sure you want to delete your account?')">DELETE THIS ACCOUNT</button>

				<?php echo form_close(); ?>

			</div>

		</div>

</div>
<script type="text/javascript">
	$('#submitPhotoEditProfile').bind('change', function() {


	  /*author wildan*/

	  var ukuran = bytesToSize(this.files[0].size).split(" ");

	  if((parseInt(ukuran[1])==2 && parseFloat(ukuran[0])>=2.0) || parseInt(ukuran[1])>2)

	  {

	  	alert("Your photo must less than 2 MB");

	  	document.getElementById("tombolSubmitPhotoEditProfile").disabled = true;

	  }

	  else

	  {

	  	document.getElementById("tombolSubmitPhotoEditProfile").disabled = false;

	  }

	  



	});



	function bytesToSize(bytes) {

		/*author wildan ambil dari internet*/

	    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];

	    if (bytes == 0) return 'n/a';

	    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));

	    if (i == 0) return bytes + ' ' + sizes[i]; 

	    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + i;

	};
</script>
<?php

	if($this->session->flashdata('form')) {

	  $msg = $this->session->flashdata('form');

	  $message = $msg['message'];

	  //echo "<script>alert('".$message."');</script>";

	  echo "<script>$(document).ready(function(){notif('".$message."');});</script>";

	}

?>