
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" style="background-color: #e0e0e0; height: 450px; ">
				<div class="intro" style="margin-top:-30px;">
					<div class="tuffyh1aa">All Places</div>
				</div>

			<div class="row places" style="padding-top: 200px;">
				<div class="col-lg-12 location">
					<div class="btn btn-warning" onclick="window.location.reload()">ALL PLACES</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Timur')">Jakarta Timur</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Barat')">Jakarta Barat</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Pusat')">Jakarta Pusat</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Utara')">Jakarta Utara</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Selatan')">Jakarta Selatan</div>
					
				</div>

				<div class="col-lg-12 location" style="margin-top: -20px;">
					<div class="form-inline">
	   					 <label class="control-label">Filter by :  </label>
	   					 <span class="field custom-dropdown ">
	   					 	 <select class="field form-control" onchange="filterFunctionFinal()" title="All Categories" id="category_select">    
							        <option value='All' >All Categories</option>
									<?php
										foreach($query1 as $row)
										{
											echo "<option value='".$row->category_name."'>".$row->category_name."</option>";
										}
									?><!--option value="">Sarinah</option>  
							        <option value="">Gelora Bung Karno</option>
							        <option value="">Atrium</option>
							        <option value="">Bank Indonesia</option-->
							    </select>
	   					 </span>

	   					 <span class="input-group col-lg-3">
	   					 	<input class="field form-control" type="text" id="name_select" placeholder="Enter keyword..." >
	   					 	<span class="input-group-btn">
	   					   	<button class="field btn btn-default" type="button" onclick="filterFunctionFinal()" style="margin-left: -9px;"><span class="fa fa-search"></span></button>
	   					 	</span>
	   				 	</span>
	  	
						<span class="field custom-dropdown bordered">
	   					 	<select onchange="sortFunction()" id="sort_select" name="sort_select" class="field form-control" title="Popularity">    
	   					     	<option value="popular" selected>Popularity</option>  
	   					     	<option value="highestRate">Highest Rating</option>
	   					     	<option value="sortAtoZ">Name: A-Z</option>
	   					     	<option value="sortZtoA">Name: Z-A</option>
	   					     	<option value="LowtoHigh">Price: Low to High</option>
	   					     	<option value="HightoLow">Price: High to Low</option>
	   					 	</select>
	   					 </span>	
	   					 <br>

	   					 <div class="form-inline" style="margin-top: 10px; padding-left: 340px; padding-right: 270px;">
		   					  
		   					 <div style="position: relative;"><!-- 
		   					 	<label class="control-label">Price range :  </label> -->
		   						 <input type="text" class="col-lg-9 range" id="range" name="range" onchange="myFunction()" value="" />
		   						 <div class="col-lg-3"></div>
		   					 </div>
		   				 </div>		 	
	   			 	</div>
	   			</div>
	   		</div>

			</div>
		</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-1"></div>
					<div class="col-lg-10" id="output_field" style="margin-bottom: 30px; margin-left: 30px;">
					<?php
					foreach($query as $row){
						if($row->pic_thumbnail==NULL){
							echo "<div class='col-lg-4 containerimg'>";
							echo "<a href='place/".$row->place_name."'><div class='txtonimg'>".$row->place_name."</div>";
							echo "<img src='".base_url('assets/img/noimg.png')."'></a>";
							echo "</div>";
						}
						else{
							echo "<div class='col-lg-4 containerimg'>";
							echo "<a href='place/".$row->place_name."'><div class='txtonimg'>".$row->place_name."</div>";
							echo "<img src='".base_url($row->pic_thumbnail)."'></a>";
							echo "</div>";
						}						
					}
					?>
					

					</div>
					<div class="col-lg-1"></div>

					<div class="col-lg-12 suggtxt">
						<center>Can not find what you are looking for? <a href="<?php if(isset($_COOKIE['username'])){echo '#suggestion';}else{echo '#openLogin';} ?>"><b> Send us a suggestion!</b></a></center>
					</div>

					 <div id="suggestion" class="openModal2">
					 <div>
		                <center><div class="tuffyh3a">I want to send a suggestion!</div></center><br>
		                <div class="col-lg-12">
		                <?php 
						$attributes = array('id' => 'formsuggestion');
						echo form_open('allplaces/send', $attributes); ?>
								<div class="form-group">
									<label class="control-label">Place Name <span class="req">*</span></label>
									<?php echo form_error('place_name'); ?>
									<?php echo form_input(array('id' => 'place_name', 'name' => 'place_name', 'class' => 'form-control', 'required' => 'required')); ?>
			  						<!-- <input class="form-control" type="text" id="place_name" name="place_name" required> -->
							    </div>
							    <div class="form-group">
									<label class="control-label">Short Description <span class="req">*</span></label>
									<?php echo form_error('description'); ?>
			  						<?php echo form_textarea(array('id' => 'description', 'name' => 'description', 'class' => 'form-control', 'rows' => '2', 'required' => 'required')); ?>
			  						<!-- <textarea class="form-control" rows="2" id="textArea" id="description" name="description" required></textarea> -->
							    </div>
							    <div style="margin-top: 25px;">
							   		<a href='#close' class='btn btn-primary' style='margin-right: -60px; margin-left: 80px;'>cancel</a>
								    <button class="btn btn-warning pull-right" type="submit">SEND</button>
								</div>
						 <?php echo form_close(); ?>
						</div>
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