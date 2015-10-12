



	<div class="container-fluid">

		<div class="row">

			<header>

				<div class="intro">

					<div class="tuffyh1">Going Somewhere?</div>

					<div class="tuffyh2">Explore fun places within your budget in Jakarta</div>

				</div>



				<!--testing facebook login -->

				<!--div id="userDetails" style="display: none;">

				<img id="userPic" src="">

				  

				 

				<div id="userInfo">

				</div>

				</div>

				<button id="loginBtn" onclick="logIn();" value="Login">Login</button>

				<button id="logoutBtn" onclick="logOut();" value="Logout" style="display: none;">Logout</button-->

				<!--end of testing facebook login -->



				<div class="col-lg-12" style="margin-top: 240px;">

					<div class="col-lg-3"></div>

					<div class="col-lg-6 box img-rounded ">

						<button id="recomm" class="field btn btn-warning" type="button">GIVE ME SOME RECOMMENDATION</button>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<button id="owntr" class="field btn btn-warning" type="button">I WANT TO MAKE MY OWN TRIP</button>

					</div>

					<div class="col-lg-3"></div>

				</div><br><br>





				<div id="showRec">				

					<div class="col-lg-12" style="margin-top: 20px;">

						<div class="col-lg-2"></div>

							<div class="col-lg-8 box img-rounded ">

								<form class="form-inline" action=<?php echo "\"".base_url()."index.php/searchCtr/setInitialVariableRec/\"";?> method="post">

								<span class="field custom-dropdown " id="ddcontainerh">

								    <select id="ddbush" class="field form-control" title="Your starting point?" type="dropdown" name="mydropdown" required>    

								        <option value="" selected disabled>Your starting point?</option>

								        <?php							        	

							        		# code...

								        	/*------------revisi code wildan-------*/

								        	for($i=1; $i<=12; $i++)

								        	{

								        		echo "<optgroup label='Koridor ".$i."'>";

								        		$yangDicari = "K".$i.".";

								        		foreach ($query as $row ) {

								        			# code...

								        			if($i>9)

								        			{

								        				if (strcmp(substr($row->halte_code, 0, 4), $yangDicari)==0) {

						        						echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";

							        					}

								        			}

								        			else

								        			{

								        				if (strcmp(substr($row->halte_code, 0, 3), $yangDicari)==0) {

						        						echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";

							        					}

								        			}

								        			

						        				}

						        				echo "</optgroup>";

								        		

								        	}

								        	/*------------end of revisi code wildan-------*/

								        			

								        ?>

								    </select>

								</span>

								

							  <span class="input-group col-lg-3">

							    <span class="field input-group-addon">Rp</span>

							    <input class="field form-control" type="text" placeholder="Budget" name="budget" title="Example: 25000, 100000" required>

							  </span>



							  <span class="input-group col-lg-3">

							 	 <input class="field datepicker" type="text" placeholder="Date" name="datepicker" required>

							  </span>



							  <button class="field btn btn-warning" type="submit">SEARCH</button>



							  </form>

							</div>

							<div class="col-lg-2"></div>

				</div>

			</div>



			<div id="showOwntr">				

					<div class="col-lg-12" style="margin-top: 20px;">

						<div class="col-lg-3"></div>

						<div class="col-lg-6 box img-rounded ">

							<form class="form-inline" action=<?php echo "\"".base_url()."index.php/searchCtr/setInitialVariable/\"";?> method="post">

								<span class="field custom-dropdown " id="ddcontainerh">

								    <select id="ddbush" class="field form-control" title="Your starting point?" type="dropdown" name="mydropdown" required>    

								        <option value="" selected disabled>Your starting point?</option>

								        <?php							        	

							        		# code...

								        	/*------------revisi code wildan-------*/

								        	for($i=1; $i<=12; $i++)

								        	{

								        		echo "<optgroup label='Koridor ".$i."'>";

								        		$yangDicari = "K".$i.".";

								        		foreach ($query as $row ) {

								        			# code...

								        			if($i>9)

								        			{

								        				if (strcmp(substr($row->halte_code, 0, 4), $yangDicari)==0) {

						        						echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";

							        					}

								        			}

								        			else

								        			{

								        				if (strcmp(substr($row->halte_code, 0, 3), $yangDicari)==0) {

						        						echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";

							        					}

								        			}

								        			

						        				}

						        				echo "</optgroup>";

								        		

								        	}

								        	/*------------end of revisi code wildan-------*/

								        		

								        ?>

								    </select>

								</span>



						  <span class="input-group col-lg-3">

						 	 <input class="field datepicker" type="text" title="Example: 25000, 100000" placeholder="Date" name="datepicker" required>

						  </span>

						  &nbsp;&nbsp;&nbsp;&nbsp;

						  <button class="field btn btn-warning" type="submit">SEARCH</button>



						  </form>

						</div> 

						<div class="col-lg-3"></div>

					</div>

				</div>





			</header>

			

			<div class="col-lg-12 even">

				<div class="tuffyh1b">MOST POPULAR</div>	

				<div class="col-lg-1"></div>

				<div class="col-lg-10">

					<?php

					foreach($mostPopular as $row){

						if($row->pic_thumbnail==NULL){

							echo "<div class='col-lg-4 homeimg'>";

							echo "<a href='place/".$row->place_name."'><div class='txtonimg'>".$row->place_name."</div>";

							echo "<img src='".base_url('assets/img/noimg.png')."'/></a>";



							echo "</div>";

						}

						else{

							echo "<div class='col-lg-4 homeimg'>";

							echo "<a href='place/".$row->place_name."'><div class='txtonimg'>".$row->place_name."</div>";

							echo "<img src='".base_url($row->pic_thumbnail)."'/></a>";

							echo "</div>";

						}						

					}

					?>

				</div>

				<div class="col-lg-1"></div>

			</div>

			

			<div class="col-lg-12 odd">

				<div class="tuffyh1b">BROWSE CATEGORIES</div>

				<div class="row">

					<div class="col-lg-12">

						<div class="col-lg-1"></div>

						<div class="col-lg-10">

							<div class="col-lg-3 homecat"><a href="AllPlacesCtr/category/education"><img src="<?php echo base_url('assets/img/cat_education.png');?>"/></a></div>	

							<div class="col-lg-3 homecat"><a href="AllPlacesCtr/category/Outdoor%20Play"><img src="<?php echo base_url('assets/img/cat_outdoorplay.png');?>"/></a></div>	

							<div class="col-lg-3 homecat"><a href="AllPlacesCtr/category/Museum"><img src="<?php echo base_url('assets/img/cat_museum.png');?>"/></a></div>	

							<div class="col-lg-3 homecat"><a href="AllPlacesCtr/category/Zoo"><img src="<?php echo base_url('assets/img/cat_zoo.png');?>"/></a></div>	

						</div>

						<div class="col-lg-1"></div>

					</div>



					<div class="col-lg-12">

						<div class="col-lg-1"></div>

						<div class="col-lg-10">

							<div class="col-lg-3 homecat"><a href="AllPlacesCtr/category/Indoor%20Play"><img src="<?php echo base_url('assets/img/cat_indoorplay.png');?>"/></div>	

							<div class="col-lg-3 homecat"><a href="AllPlacesCtr/category/Water%20Park"><img src="<?php echo base_url('assets/img/cat_waterpark.png');?>"/></div>	

							<div class="col-lg-3 homecat"><a href="AllPlacesCtr/category/Theme%20Park"><img src="<?php echo base_url('assets/img/cat_themepark.png');?>"/></div>	

							<div class="col-lg-3 homecat"><a href="AllPlacesCtr/category/View"><img src="<?php echo base_url('assets/img/cat_scenery.png');?>"/></div>

						</div>

						<div class="col-lg-1"></div>

					</div>



					

					<div class="col-lg-12" style="margin-top: 20px;">

						<div class="col-lg-5"></div>

							<!-- <a href="http://localhost/Jaktrip/index.php/allPlacesCtr"><button class="col-lg-2 field btn btn-warning" type="button">BROWSE ALL</button></a> -->

							<a href="<?php echo base_url('/allplaces') ?>"><button class="col-lg-2 field btn btn-warning" type="button">BROWSE ALL</button></a>

						<div class="col-lg-5"></div>

					</div>

					

				</div>

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