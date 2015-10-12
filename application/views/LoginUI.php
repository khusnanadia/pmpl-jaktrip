	<div class="container-fluid">



		<div class="col-lg-3">

		</div>		

		<div class="row">	

		<div class="alert alert-dismissible alert-danger col-lg-6" style="text-align: center; margin-top: 100px; margin-bottom: -50px;">

				<button type="button" class="close" data-dismiss="alert" style="color: #fff !important">×</button>

				<strong>Ooops!</strong> The username and password you entered did not match our records. Please try again.</div>

				</div>

		<div class="col-lg-4"></div>

		<div class="col-lg-4 formlogin">		

				<center><div class="tuffyh2a">Log In to JAKtrip</div></center><br>

				<form role="form" class="form-group" method="POST" action="<?php echo base_url('LoginCtr/checkLogin/');?>">

					<input class="form-control form-group" type="text" name="username" placeholder="E-mail/username" required>

					<input class="form-control form-group" type="password" name="password" placeholder="Password" required>

					<span class="col-lg-5"><input type="checkbox" name="remember"> Remember me</span>

					<span class="col-lg-2"></span>

					<span class="col-lg-5"><a href="#">Forgot password?</a></span><br><br>

					<button class="login btn btn-warning" type="submit">LOG IN</button><br><br>

					<center>Or login with your account below<center><br>

					<div class="iconsocial">

						<a href="#"><span class="fa fa-google-plus-square" style="color: #E03F3F;"></span></a>

						<a href="#"><span class="fa fa-facebook-square" style="color: #43468C;"></span></a>

						<a href="#"><span class="fa fa-twitter-square" style="color: #2EA0F2;"></span></a>

					</div>

					<br>

					<center>Don't have an account? <a href="">Sign Up.</a><center>

				</form>

		</div>

		</div>

		<div class="col-lg-4">

		</div>

	</div>

