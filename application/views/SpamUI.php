<!--
author: Syifa Khairunnisa

Menampilkan list spam di menu admin page
-->

<div class="col-lg-8">
	<div class="tuffyh2a admintitle">Review Spam</div>

	<span id="openLogin" class="newpost" >
	<table id="tab1" class="newpost table table-striped table-hover">
	  <thead >
	    <tr style="text-align: center;">
	      <th>Tourist Attraction</th>
	      <th>Review</th>
	      <th>Reasons</th>
	      <th>Reports</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
  	  	<?php
		foreach($query as $row){
			$a = (int)$row->is_nudity;
			$b = (int)$row->is_spam;
			$c = (int)$row->is_falsestatement;
			$d = (int)$row->is_unrelatedcontent;
			$e = (int)$row->is_profanity;
			$f = $b +$a +$c+$d+$e ;
			echo "<td>".$row->place_name."</td>";
			echo "<td>".$row->review	."</td>";
			echo "<td>";
			if ($row->is_nudity > 0){
				echo "Nudity, ";
			}
			if ($row->is_spam > 0){
				echo "Spam, ";
			}	
			if ($row->is_falsestatement > 0){
				echo "False Statement, ";
			}
			if ($row->is_unrelatedcontent > 0){
				echo "Unrelated Content, ";
			}
			if ($row->is_profanity > 0){
				echo "Profanity, ";
			}
			echo "</td>";
			echo "<td>".$f."</td>";
			echo "<td>";
			$onclick = array('onclick'=>"return confirm('Are you sure to delete this review?')");
			echo anchor('SpamCtr/del/'.$row->id_rate,'<span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete', $onclick)."</td>";
			echo "</tr>";
		}
		?>
	  </tbody>
	</table><br>
	<div style="height: 200px"></div>
</div>

<!--close header-->
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