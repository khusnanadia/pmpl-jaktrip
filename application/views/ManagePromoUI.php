<!--
author: Syifa Khairunnisa
editor: Khusna Nadia

Menampilkan list promo di menu admin page
-->


<div class="col-lg-9">
	<div class="tuffyh2a admintitle">All Promo</div>

	<span class="input-group col-lg-7" style="margin-left: 150px;">
	    <input id="name_select" class="fieldsml form-control" type="text" placeholder="Promo search" style="background-color: #f0f0f0 !important;">
	    <span onclick="" class="input-group-btn">
	      <button class="fieldsml btn btn-default" type="button" style="width:40%; padding-left: 20px; padding-right: 20px;"><span class="fa fa-search"></span></button>
	    </span>
    </span><br>

    <div class="searchmember col-lg-12">
    	<ul class="letters">
	   		<li><a href="javascript:">A</a></li>
	   		<li><a href="javascript:">B</a></li>
	   		<li><a href="javascript:">C</a></li>
	   		<li><a href="javascript:">D</a></li>
	   		<li><a href="javascript:">E</a></li>
	   		<li><a href="javascript:">F</a></li>
	   		<li><a href="javascript:">G</a></li>
	   		<li><a href="javascript:">H</a></li>
	   		<li><a href="javascript:">I</a></li>
	   		<li><a href="javascript:">J</a></li>
	   		<li><a href="javascript:">K</a></li>
	   		<li><a href="javascript:">L</a></li>
	   		<li><a href="javascript:">M</a></li>
	   		<li><a href="javascript:">N</a></li>
	   		<li><a href="javascript:">O</a></li>
	   		<li><a href="javascript:">P</a></li>
	   		<li><a href="javascript:">Q</a></li>
	   		<li><a href="javascript:">R</a></li>
	   		<li><a href="javascript:">S</a></li>
	   		<li><a href="javascript:">T</a></li>
	   		<li><a href="javascript:">U</a></li>
	   		<li><a href="javascript:">V</a></li>
	  		<li><a href="javascript:">W</a></li>
	   		<li><a href="javascript:">X</a></li>
	   		<li><a href="javascript:">Y</a></li>
	   		<li><a href="javascript:">Z</a></li>
	   	</ul>
	</div>
	<br><br><br>

	<table id="tab1" class="newpost table table-striped table-hover">
	  <thead style="text-align: center !important;">
	    <tr>
	      <th>Place Name</th>
	      <th>Promo Title</th>
	      <th>Type</th>
	      <th>Status</th>
	      <th colspan="3">Action</th>
	    </tr>
	  </thead>
	  <tbody>
  		<?php
  			for($i=0; $i<count($promo); $i++){
				$row = $promo[$i];
				echo "<tr>";
				echo "<td>".$row->place_name."</td>";
				echo "<td>".$row->title."</td>";
				echo "<td>".$type_[$i]."</td>";
				$currentDate = date("Y-m-d");
				$startdate = date($row->start_date);
				$enddate = date($row->end_date);
				if($startdate <= $currentDate && $enddate >= $currentDate){
					echo "<td>On going</td>";
				}else if($startdate > $currentDate && $enddate > $currentDate){
					echo "<td>Coming Soon</td>";
				}
				else if($enddate < $currentDate){
					echo "<td>Expired</td>";
				}
				echo "<td>";
				$onclick = array('onclick'=>"return confirm('Are you sure you want to delete promo ".$row->title." from ".$row->place_name."?')");
				echo anchor('admin/promo/delete/'.$row->id_promo,'<span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete', $onclick)."</td>";
				echo "<td>". anchor('admin/promo/edit/' .$row->id_promo, '<span class="fa fa-pencil"></span>&nbsp;&nbsp;Edit') ."</td>";
				echo "<td><a href='".base_url($row->photo)."' data-lightbox='".$row->id_promo."' data-title='".$row->description."'><span class='fa fa-eye'></span>&nbsp;&nbsp;View</a></td>";
				echo "</tr>";
			}
		?>
	  </tbody>
	</table><br>
</div>

<div class="col-lg-3">
	<div style="margin-top: 20px; margin-left: -50px">
		<input type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url('admin/addnewpromo');?>'" value="Add New Promo">
	</div>
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