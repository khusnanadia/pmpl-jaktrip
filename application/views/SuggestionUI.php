	<div class="col-lg-12" style="background-color: #fff;">
		<div class="tuffyh2a admintitle">Suggestions</div>
		
		<div class="col-lg-2"></div>

		<div class="col-lg-8">
			<ul class="nav nav-pills fak">
				<li id="liplac"><a href="#places">Places</a></li>
				<li id="liphot"><a href="#photos">Photos</a></li>
			</ul>			
			<br><br>
			<div id="places" style="margin: 0px 150px 100px -200px;" >
				<table class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <!-- th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th -->
				      <th>Place Name</th>
				      <th>Description</th>
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
							foreach($query as $row)
							{
							$place=$row->place_name;
							$check=mysql_query("SELECT place_name FROM tourist_attraction as ta WHERE ta.place_name='$place'");
							echo "<tr>";
							echo "<td>".$row->place_name."</td>";
							echo "<td>".$row->description."</td>";
							if(mysql_num_rows($check)>0){
								echo "<td>Added</td>";
							}
							else{
								echo "<td><a href=".base_url('admin/addnewplace')." target='_blank'>Add New Place?</a></td>";
							}
							
							echo "</tr>";
							}
							//echo "</table>";
	
						?>
				  </tbody>
				</table>
			</div>

			<div id="photos" style="margin: 0px 150px 100px -200px;" >
				<table id="tableSuggestionPhoto" class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <!-- th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th -->
				      <th>Place Name</th>
				      <th>Link</th>
				      <th>Username</th>
				      <th width='200px'>Status</th>
				      <!-- <th>Preview Picture</th> -->
				    </tr>
				  </thead>
				  <tbody id="output_field123" >
				  <?php 
				  // foreach ($query3 as $row) {
				  // 	# code...
				  // 	$link_pic = str_replace("./",base_url(),$row->pic);
				  // 	echo "<div id='previewPicture".$row->id_pic."' class='openModalPreviewPic'><div class=\"parentPic\"><img src='".$link_pic."'><a href='#close' title='Close' class='close'><span class='fa fa-times' style=\"color:white\"></span></a></div></div>";
				  // }
				  foreach($query2 as $row)
				  {
				  	$link_pic = str_replace("./",base_url(),$row->pic);
					echo "<tr>";
					echo "<td>".$row->place_name."</td>";
					echo "<td><a href='".$link_pic."'  data-lightbox='".$row->place_name."' data-title='".$row->pic_info."'>".$row->pic."</a></td>";
					echo "<td>".$row->username."</td>";
					if($row->is_publish == 0){
				  		echo "<td><a href='javascript:setphotopublish(".$row->id_pic.")'>&nbsp;&nbsp;Publish?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				  	}else{
						echo "<td><a href='javascript:setphotounpublish(".$row->id_pic.")'>&nbsp;&nbsp;Unpublish?</a>&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					$onclick = array('onclick'=>"return confirm('Are you sure you want to delete this photo from ".$row->place_name."?')");
					echo anchor('admin/suggestions/delete/'.$row->id_pic,'<span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete', $onclick)."</td>";
					
					echo "</tr>";
					
				  }

				  ?>
				  </tbody>
				</table>
				<?php
					echo "<div class='row'><div class='col-lg-2'></div>";
					echo "<div class='col-lg-8'>";
					echo '<ul class="pagination">';
				  	for($i=0; $i<$count_all/10; $i++)
					{
					  	echo "<li><a href='javascript:goToPageSuggestion(".($i+1).")'>".($i+1)."</a></li>";
					}
					echo '</ul></div>';
					echo "<div class='col-lg-2'></div></div>";

					// function get_paging_info($tot_rows,$pp,$curr_page)
					// {
					//     $pages = ceil($tot_rows / $pp); // calc pages

					//     $data = array(); // start out array
					//     $data['si']        = ($curr_page * $pp) - $pp; // what row to start at
					//     $data['pages']     = $pages;                   // add the pages
					//     $data['curr_page'] = $curr_page;               // Whats the current page

					//     return $data; //return the paging data

					// }

					// //echo '<ul class="pagination">';
					// $paging_info = get_paging_info($count_all,15,1); 

					// if($paging_info['curr_page'] > 1){
					// 	echo "<a href='' title='Page 1'>First</a>";
			  //       	echo "<a href='' title='Page '".($paging_info['curr_page'] - 1)."'>Prev</a>";
					// }

					// //$max is equal to number of links shown
					// $max = 5;
			  //       if($paging_info['curr_page'] < $max){
			  //           $sp = 1;
			  //       }elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) ){
			  //           $sp = $paging_info['pages'] - $max + 1;
			  //       }elseif($paging_info['curr_page'] >= $max){
			  //           $sp = $paging_info['curr_page']  - floor($max/2);
			  //       }

			  //       if($paging_info['curr_page'] >= $max){
			  //       	echo "<a href='' title='Page 1'>1</a>";
			  //       }

			  //       for($i = $sp; $i <= ($sp + $max -1);$i++){
			  //       	if($i > $paging_info['pages']){
     //            			continue;
     //            		}
     //            		if($paging_info['curr_page'] == $i){
     //            			echo "<span class='bold'>".$i."</span>";
     //            		}else{
     //            			echo "<a href='' title='Page ".$i."'>".$i."</a>";
     //            		}
			  //       }

			  //       if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))){
			  //       	echo "<a href='' title='Page ".$paging_info['pages']."'>".$paging_info['pages']."></a>";
			  //       }

			  //       if($paging_info['curr_page'] < $paging_info['pages']){
			  //       	echo "<a href='".str_replace('/page'.$paging_info['curr_page'], '', $paging_info['curr_url']) . '/page'.($paging_info['curr_page'] + 1)."' title='Page ".($paging_info['curr_page'] + 1)."'>Next</a>";
			  //       	echo "<a href='".str_replace('/page'.$paging_info['curr_page'], '', $paging_info['curr_url']) . '/page'.$paging_info['pages']."' title='Page ".$paging_info['pages']."'>Last</a>";
			  //       }
			       

					
				?>
			</div>

		
		</div>

		<div class="col-lg-2"></div>

	</div>
		
		</div>
</div>