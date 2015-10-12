<div class="container">
	<div class="row" style="margin-top: 100px;">

			<div class="col-lg-12">

				<div class="tuffyh2a admintitle">Register New Account</div>
				<?php
				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');
				echo form_open('RegisterCtr/addMember', $attributes); ?>
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Name <span class="req">*</span></label>
  						<input class="form-control" type="text" value="<?php echo $name;?>" id="name" name="name" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Username <span class="req">*</span></label>
						<?php echo form_error('username'); ?>
  						<input class="form-control" type="text"value="<?php echo $username;?>" id="username" name="username" required>
						
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">E-mail <span class="req">*</span></label>
						<?php echo form_error('email'); ?>
  						<input class="form-control" type="email"  value="<?php echo $email;?>" id="email" name="email" required>
						
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Password <span class="req">*</span></label>
  						<input class="form-control" type="password" value="" id="password" name="password" required>
				      <br></div>
				    </div>
					<br>
					
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Password Confirmation <span class="req">*</span></label>
						<?php echo form_error('pass_confirm'); ?>
  						<input class="form-control" type="password" value="" id="pass_confirm" name="pass_confirm" required>
						
				      <br></div>
				    </div>
					<br>
				  
				    <br><br>

				    <button class="btn btn-warning" type="submit">SUBMIT</button>
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