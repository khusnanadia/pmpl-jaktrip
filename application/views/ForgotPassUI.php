	<div class="container-fluid">

		<div class="col-lg-4">
		</div>		
		
		<div class="col-lg-4 formlogin">		
				<center><div class="tuffyh2a">Enter Your E-mail</div></center>
				We will reset your password and send it to your e-mail.<hr><br>
				<form role="form" class="form-group" method="POST" action="<?php echo base_url('login/forgotpassword/check');?>">
					<input class="form-control form-group" type="text" name="email" placeholder="E-mail" required>
				
				<br><br>
					<button class="login btn btn-warning" type="submit">SEND</button><br><br>
				
				</form>
		</div>
		</div>
		<div class="col-lg-4">
		</div>
	</div>
