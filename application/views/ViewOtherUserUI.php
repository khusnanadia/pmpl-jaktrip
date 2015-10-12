<div class="row" style="margin:120px 0px;">
		<div class="col-lg-1"></div>
		<div class="col-lg-3">
			<div class="tuffyh2a">
				<?php foreach ($member as $row){
					echo $row->name;
					$link = $row->pic;
					echo '</div>';
					if(strpos($link,'https://')!==false){
						echo '<a href="'.$row->pic.'" data-lightbox="'.$row->name.'" data-title="'.$row->name.'"><div class="userphoto"><img src="'.$row->pic.'"></div></a>';
						
					}
					else{
						echo '<a href="'.$row->pic.'" data-lightbox="'.$row->name.'" data-title="'.$row->name.'"><div class="userphoto"><img src="'.$row->pic.'"></div></a>';
					}

					echo '<div class="col-lg-12 userbio">'.$row->bio.'</div><br>';
				} 
				?>
			
			<div class="usermenu">
				<ul class="nav nav-pills nav-stacked navprofile">
					<li id="litrip"><a href="#trips">Trips<span class="fa fa-angle-right pull-right" style="font-size: 18px;"></span></a></li>
					<li id="liachi"><a href="#visited">Visited<span class="fa fa-angle-right pull-right" style="font-size: 18px;"></span></a></li>
					<li id="liwish"><a href="#wishlist">Wishlist<span class="fa fa-angle-right pull-right" style="font-size: 18px;"></span></a></li>
					<li id="lirevi"><a href="#reviews">Reviews<span class="fa fa-angle-right pull-right" style="font-size: 18px;"></span></a></li>
				</ul>
			</div>
		</div>

		<div class="col-lg-6">
			<div id="trips" class="usercontent">
				<?php
					$array_trip = json_encode($query_trip);
					$res = mysql_query("SELECT * FROM trips WHERE username = '".$thisUser."'");
		            if(mysql_num_rows($res)==0){
						echo '<div class="col-lg-2"></div>';
						echo '<div class="col-lg-8">';
						echo '<img src='.base_url("assets/img/notrip.png").'>';
						echo '</div><div class="col-lg-2"></div>';
			    	}
			    	else{
			    		foreach ($query_trip as $trip) {
							$data_trip = explode("YYY",$trip['detail_trip']);
							$total_price = explode("xx",$data_trip[3]);
							$place_id = explode("xx",$data_trip[1]);
							$harga = 0;
							for($i=0; $i<count($total_price)-1; $i++)
							{
								if((strcmp($place_id[$i], "-1")  != 0))	
								{
									$harga = $harga + intval($total_price[$i]);
								}
								
							}
							$viewTripUrl = 'profile/viewtrip/'.$user."/".$trip['id_trip'];
							$deleteTripUrl = 'user/trip/deletetrip/'.$trip['id_trip'];
							$pic = mysql_fetch_array(mysql_query("SELECT pic_thumbnail FROM tourist_attraction WHERE id = ".$place_id[0].""));
							echo "<div class='row coll'>";
								echo "<a href=".base_url($viewTripUrl).">";
									echo "<div class='col-lg-2 pic-small'><img src='".base_url($pic['pic_thumbnail'])."'></div>";
									echo "<div class='col-lg-8'>";
										echo "<div class='tuffyh3a'>".$data_trip[0]." Places</div>";
										echo "In <b>".date('d-M-Y', strtotime($trip['date_trip']))."</b> | Start from <b>Halte ".$data_trip[2]."</b> | Total: <b>Rp ".$harga."</b>";
									echo "</div>";
								echo "</a>";
								$onclick = array('onclick'=>"return confirm('Are you sure you want to delete this trip?')");
								// echo anchor(base_url($deleteTripUrl),'<span class="fa fa-trash-o iconcol"></span>', $onclick)."";
							
							echo "</div>"; 
						}
			    	}
				?>
			</div>

			<div id="wishlist" class="usercontent">
				<?php
					$res = mysql_query("SELECT is_wishlist FROM collection WHERE is_wishlist = '1' AND username = '".$thisUser."'");
		            if(mysql_num_rows($res)==0){
						echo '<div class="col-lg-2"></div>';
						echo '<div class="col-lg-8">';
						echo '<img src='.base_url("assets/img/nowishlist.png").'>';
						echo '</div><div class="col-lg-2"></div>';
			    	}
			    	else{
						foreach ($wishlist as $row) {
							$thisPlace = str_replace("%20", " ",$row->place_name);
							$pic = mysql_fetch_assoc(mysql_query("SELECT pic_thumbnail FROM tourist_attraction WHERE place_name = '".$thisPlace."'"));
							echo '<div class="row coll"><a href="#">';
							if($pic["pic_thumbnail"]===null){
								echo '<div class="col-lg-2 pic-small"><img src="'.base_url('assets/img/noimg.png').'"></div>';
							}
							else{
								echo '<div class="col-lg-2 pic-small"><img src="'.base_url($pic["pic_thumbnail"]).'"></div>';
							}	
							echo '<div class="col-lg-8">';
							echo '<div class="tuffyh3a">'.$row->place_name.'</div>';
							echo $row->city;
							echo '</div><div class="col-lg-2"><span id="'.$row->id_collect.'" class="fa fa-heart iconcol w"></span></div>';
							echo '</a></div>';
						}
					}
				?>
				
				<!-- <div class="row coll">
					<a href="#">
						<div class="col-lg-2"><img src="<?php // echo base_url('assets/img/50.jpg');?>"></div>
						<div class="col-lg-8">
							<div class="tuffyh3a">Planetarium</div>
							Jakarta Barat
						</div>
						<div class="col-lg-2"><span class="fa fa-heart iconcol w"></span></div>
					</a>
				</div> -->
			</div>

			<div id="visited" class="usercontent">
				<?php
					$res = mysql_query("SELECT is_visited FROM collection WHERE is_visited = '1' AND username = '".$thisUser."'");
		            if(mysql_num_rows($res)==0){
						echo '<div class="col-lg-2"></div>';
						echo '<div class="col-lg-8">';
						echo '<img src='.base_url("assets/img/noachievement.png").'>';
						echo '</div><div class="col-lg-2"></div>';
			    	}
			    	else{
						foreach ($visited as $row) {
							$thisPlace = str_replace("%20", " ",$row->place_name);
							$pic = mysql_fetch_assoc(mysql_query("SELECT pic_thumbnail FROM tourist_attraction WHERE place_name = '".$thisPlace."'"));
							echo '<div class="row coll"><a href="#">';
							if($pic["pic_thumbnail"]===null){
								echo '<div class="col-lg-2 pic-small"><img src="'.base_url('assets/img/noimg.png').'"></div>';
							}
							else{
								echo '<div class="col-lg-2 pic-small"><img src="'.base_url($pic["pic_thumbnail"]).'"></div>';
							}	
							echo '<div class="col-lg-8">';
							echo '<div class="tuffyh3a">'.$row->place_name.'</div>';
							echo $row->city;
							echo '</div><div class="col-lg-2"><span id="'.$row->id_collect.'" class="fa fa-check-circle iconcol a"></span></div>';
							echo '</a></div>';
						}
					}
				?>
				<!-- <div class="row coll">
					<a href="#">
						<div class="col-lg-2"><img src="<?php //echo base_url('assets/img/50.jpg');?>"></div>
						<div class="col-lg-8">
							<div class="tuffyh3a">Museum Nasional</div>
							Jakarta Pusat
						</div>
						<div class="col-lg-2"><span class="fa fa-check-circle iconcol a"></span></div>
					</a>
				</div> -->
			</div>

			<div id="reviews" class="usercontent">
				<?php
					$res = mysql_query("SELECT * FROM rating WHERE username = '".$thisUser."'");
		            if(mysql_num_rows($res)==0){
						echo '<div class="col-lg-2"></div>';
						echo '<div class="col-lg-8">';
						echo '<img src='.base_url("assets/img/noreview.png").'>';
						echo '</div><div class="col-lg-2"></div>';
			    	}
			    	else{
			    		foreach ($review as $row) {
							$pic = mysql_fetch_assoc(mysql_query("SELECT pic_thumbnail FROM tourist_attraction WHERE place_name = '".$row->place_name."'"));
							$delRevUrl = 'user/review/delete/'.$row->id_rate;
				    		echo '<div class="row collrev"><a href="'.base_url("place/".$row->place_name.'').'">';
							if($pic["pic_thumbnail"]===null){
								echo '<div class="col-lg-2 pic-small" style="margin-top: 20px;"><img src="'.base_url('assets/img/noimg.png').'"></div>';
							}
							else{
								echo '<div class="col-lg-2 pic-small" style="margin-top: 20px;"><img src="'.base_url($pic["pic_thumbnail"]).'"></div>';
							}	;
							echo '<div class="col-lg-8">';
							echo '<div class="tuffyh3a">'.$row->place_name.'</div>';
							if ($row->rate == 0)
								{echo "<span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span>";}
							elseif ($row->rate == 1)
								{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							elseif ($row->rate == 2)
								{echo"<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							elseif ($row->rate == 3)
								{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							elseif ($row->rate == 4)
								{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span>";}
							elseif ($row->rate == 5)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span>";}
							else{}	
							echo '<div>'.$row->review.'</div></div>';
							$onclick2 = array('onclick'=>"return confirm('Are you sure you want to delete this review?')");
							// echo "</div>";
							echo anchor(base_url($delRevUrl),'<span></span>', $onclick2)."</div>";
						}
			    	}
					

				?>
				<!-- <div class="row collrev">
					<a href="#">
						<div class="col-lg-2"><img src="<?php// echo base_url('assets/img/50.jpg');?>"></div>
						<div class="col-lg-8">
							<div class="tuffyh3a">Museum Wayang</div>
							<span class='fa fa-star' style='color: #F7E51E'></span>
							<span class='fa fa-star' style='color: #F7E51E'></span>
							<span class='fa fa-star-o'></span>
							<span class='fa fa-star-o'></span>
							<span class='fa fa-star-o'></span>
						</div>
						<div class="col-lg-2"></div>
					</a>
				</div> -->
			</div>

		</div>

		<div class="col-lg-2"></div>

</div>	

<?php
	if($this->session->flashdata('form')) {
	  $msg = $this->session->flashdata('form');
	  $message = $msg['message'];
	  //echo "<script>alert('".$message."');</script>";
	  echo "<script>$(document).ready(function(){notif('".$message."');});</script>";
	}
?>
<!--script type="text/javascript">
$(document).ready(function() {
	$("span.iconcol").click(function(){
		var id = $(this).attr('id');
		if($(this).hasClass("w")){
			var c = confirm("Are you sure you want to remove this from your wishlist?");
			if(c==true){
				$(this).removeClass("w");
				$(this).addClass("w-none");
				setTimeout(function () {
					location.href='UsersCtr/remWishlist/'+id;
				}, 3500); 
				notifDelWishlist();
			}
		}
		else if($(this).hasClass("a")){
			var c = confirm("Are you sure you want to remove this from your visited?");
			if(c==true){
				$(this).removeClass("a");
				$(this).addClass("a-none");
				setTimeout(function () {
					location.href='UsersCtr/remVisited/'+id;
				}, 3500); 
				notifDelAchievement();
			}
		}				
		else{}
	});
});
</script-->