
			<div class="col-lg-9">
					
				<div class="tuffyh2a admintitle">All Places</div>

				<span class="input-group col-lg-7" style="margin-left: 150px;">
				    <input id="name_select" class="fieldsml form-control" type="text" placeholder="Place search" style="background-color: #f0f0f0 !important;">
				    <span onclick="filterFunctionFinalTour()" class="input-group-btn">
				      <button class="fieldsml btn btn-default" type="button" style="width:40%; padding-left: 20px; padding-right: 20px;"><span class="fa fa-search"></span></button>
				    </span>
			    </span><br>

			    <div class="searchmember col-lg-12">
			    	<ul class="letters">
			    		<li><a href="javascript:filterFunctionTour('a')">A</a></li>
			    		<li><a href="javascript:filterFunctionTour('b')">B</a></li>
			    		<li><a href="javascript:filterFunctionTour('c')">C</a></li>
			    		<li><a href="javascript:filterFunctionTour('d')">D</a></li>
			    		<li><a href="javascript:filterFunctionTour('e')">E</a></li>
			    		<li><a href="javascript:filterFunctionTour('f')">F</a></li>
			    		<li><a href="javascript:filterFunctionTour('g')">G</a></li>
			    		<li><a href="javascript:filterFunctionTour('h')">H</a></li>
			    		<li><a href="javascript:filterFunctionTour('i')">I</a></li>
			    		<li><a href="javascript:filterFunctionTour('j')">J</a></li>
			    		<li><a href="javascript:filterFunctionTour('k')">K</a></li>
			    		<li><a href="javascript:filterFunctionTour('l')">L</a></li>
			    		<li><a href="javascript:filterFunctionTour('m')">M</a></li>
			    		<li><a href="javascript:filterFunctionTour('n')">N</a></li>
			    		<li><a href="javascript:filterFunctionTour('o')">O</a></li>
			    		<li><a href="javascript:filterFunctionTour('p')">P</a></li>
			    		<li><a href="javascript:filterFunctionTour('q')">Q</a></li>
			    		<li><a href="javascript:filterFunctionTour('r')">R</a></li>
			    		<li><a href="javascript:filterFunctionTour('s')">S</a></li>
			    		<li><a href="javascript:filterFunctionTour('t')">T</a></li>
			    		<li><a href="javascript:filterFunctionTour('u')">U</a></li>
			    		<li><a href="javascript:filterFunctionTour('v')">V</a></li>
			    		<li><a href="javascript:filterFunctionTour('w')">W</a></li>
			    		<li><a href="javascript:filterFunctionTour('x')">X</a></li>
			    		<li><a href="javascript:filterFunctionTour('y')">Y</a></li>
			    		<li><a href="javascript:filterFunctionTour('z')">Z</a></li>
			    	</ul>			    	
			    </div>
			    <br><br><br>

				
				<!-- <span id="openLogin" class="newpost"><a href=""><span class="fa fa-pencil"></span>&nbsp;&nbsp;Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href=""><span class="fa fa-eye"></span>&nbsp;&nbsp;View</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href=""><span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete</a></span><br><br> -->

				<table id="tab1" class="newpost table table-striped table-hover">
				  <thead style="text-align: center !important;">
				    <tr>
				      <!-- th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th -->
				      <th>Title</th>
				      <th>Author</th>
				      <th>Categories</th>
				      <th>Last Modified</th>
				      <th>Visitors</th>
				      <th colspan="3">Action</th>
				    </tr>
				  </thead>
				  <tbody id="output_field">
				    <?php for($i=0; $i<count($tourattr); $i++){
							$row = $tourattr[$i];
							echo "<tr>";
							//echo "<td><input type='checkbox' value=''/></td>";
							echo "<td>". $row->place_name ."</td>";
							echo "<td>". $row->author ."</td>";
							echo "<td>". $cat[$i]."</td>";
							echo "<td>". $row->last_modified ."</td>";
							echo "<td>". $row->visitors ."</td>";
							echo "<td width='80px;'>";
							$onclick = array('onclick'=>"return confirm('Are you sure you want to delete ".$row->place_name."?')");
							echo anchor('admin/places/delete/'.$row->place_name,'<span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete', $onclick)."</td>";
							echo "<td width='80px;'>". anchor('admin/places/edit/' .$row->place_name, '<span class="fa fa-pencil"></span>&nbsp;&nbsp;Edit') ."</td>";
							echo "<td width='80px;'><a href='".base_url('place')."/".$row->place_name."'><span class='fa fa-eye'></span>&nbsp;&nbsp;View</a></td>";
							echo "</tr>";
						}
					?>
				  </tbody>
				</table><br>

			<!--	<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul><br>-->
			</div>

			<div class="col-lg-3">
				<div style="margin-top: 20px; margin-left: -50px">
				<input type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url('admin/addnewplace');?>'" value="Add New Place">
				</div>
			</div>
			
		</div>
	</div>

<?php
	if($this->session->flashdata('form')) {
	  $msg = $this->session->flashdata('form');
	  $message = $msg['message'];
	  echo "<script>$(document).ready(function(){notif('".$message."');});</script>";
	}
?>