
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" style="background-color: #e0e0e0; height: 400px; ">
				<div class="intro" style="margin-top:-30px;">
					<div class="tuffyh1aa">All Promo</div>
				</div>

			<div class="row places" style="padding-top: 200px;">
				<div class="col-lg-12 location">
					<div class="btn btn-warning" onclick="window.location.reload()">ALL PROMO</div>
					<div class="btn btn-warning" onclick="filterpromo('Jakarta%20Timur')">Jakarta Timur</div>
					<div class="btn btn-warning" onclick="filterpromo('Jakarta%20Barat')">Jakarta Barat</div>
					<div class="btn btn-warning" onclick="filterpromo('Jakarta%20Pusat')">Jakarta Pusat</div>
					<div class="btn btn-warning" onclick="filterpromo('Jakarta%20Utara')">Jakarta Utara</div>
					<div class="btn btn-warning" onclick="filterpromo('Jakarta%20Selatan')">Jakarta Selatan</div>
					
				</div>

				<div class="col-lg-12 location" style="margin-top: -20px;">
					<div class="form-inline">
	   					<label class="control-label">Filter by :  </label>
	   					<span class="field custom-dropdown ">
	   					 	<select class="field form-control" onchange="promotypefunction()" title="All Categories" id="category_select">    
							        <option value='All' >All Types</option>
									<?php
										foreach($query1 as $row){
											echo "<option value='".$row->type_name."'>".$row->type_name."</option>";
										}
									?>
							    </select>
	   					 </span>

	   					 <span class="input-group col-lg-3">
	   					 	<input class="field form-control" type="text" id="name_select" placeholder="Enter keyword..." >
	   					 	<span class="input-group-btn">
	   					   	<button class="field btn btn-default" type="button" onclick="filterFunctionpromo()" style="margin-left: -9px;"><span class="fa fa-search"></span></button>
	   					 	</span>
	   				 	</span>
	  		 	
	   			 	</div>
	   			</div>
	   		</div>

			</div>
		</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-1"></div>
					<div class="col-lg-10" id="output_field" style="margin-bottom: 30px;">
						<div class="row boxpr">
						<?php
						foreach($query as $row){
							echo "<div class='col-lg-6 boxpromo'>";
							if($row->photo==NULL){
								echo "<a href='".base_url('assets/img/noimg.png')."' data-lightbox='".$row->id_promo."' data-title='".$row->description."'>";
								echo "<div class='col-lg-5 containerimg-s'><img src='".base_url('assets/img/noimg.png')."'></div>";
							}
							else{
								echo "<a href='".base_url($row->photo)."' data-lightbox='".$row->id_promo."' data-title='".$row->description."'>";
								echo "<div class='col-lg-5 containerimg-s'><img src='".base_url($row->photo)."'></div>";
							}
							echo "<div class='col-lg-7'><div style='height: 10px'></div>";
							echo "<span class='tuffyh3a'>".$row->title."</span> <br> <b>".$row->place_name."</b><br>".nl2br($row->description)." <br>Berlaku sampai: <b>".$row->end_date."</b>";
							echo "</div></a></div>";
						}
							
								
						?>
					
					</div></div>
					<div class="col-lg-1"></div>
				</div>
			</div>
	</div>