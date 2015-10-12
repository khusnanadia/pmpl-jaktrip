<div class="row" style="background-color: #fff">

	<div class="col-lg-12">

		<div class="col-lg-1"></div>

		<div class="col-lg-10">

			<div class="headerdetail">

				<?php

					$res = mysql_query("SELECT * FROM tourist_attraction WHERE place_name = '".$thisPlace."' AND pic_thumbnail IS NOT NULL");

		            if(mysql_num_rows($res)==0){

		            	echo "<img src='".base_url('assets/img/headerplace.jpg')."' class='headerdetail'>";

		            }

		            else{

		            	foreach($query as $row){

							echo "<img src='".base_url($row->pic_thumbnail)."' class='headerdetail'>";

						}

		            }

				 

				?>

			</div>

		

			<div class="col-lg-1"></div>

			<div class="col-lg-10" style="margin-top: -10px; margin-left: 8px;">

				<span class="tuffyh2a" style="margin-top: 5px;"><?php foreach($query as $row){echo $row->place_name;}?></span>&nbsp;&nbsp;&nbsp;&nbsp;

				<span><?php foreach($query as $row){echo $row->city;}?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<?php 	$avgrate = 0; 

						$total = 0;

						foreach($query2 as $row)

						{

							$avgrate = $avgrate + $row->rate;

							$total = $total +1;

						}

						if($avgrate != 0)

						{$avgrate = round($avgrate/ $total);}

					if ($avgrate == 0)

						{echo "<span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span>";}

					elseif ($avgrate == 1)

						{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}

					elseif ($avgrate == 2)

						{echo"<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}

					elseif ($avgrate == 3)

						{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}

					elseif ($avgrate == 4)

						{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span>";}

					elseif ($avgrate == 5)

					{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span>";}

					else{}		

				?>

				<!--/span-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<span style="font-size: 24px;">

				 <!--a href="#"><span class="fa fa-google-plus-square" style="color: #E03F3F;"></span></a-->&nbsp;

				 <?php foreach($query as $row){ 

				 	//echo "<div class='fb-share-button' data-href='".$row->place_name."' data-layout='icon' data-width:'24'></div>";

				 	//echo "<a href='https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&sdk=joey&u=".base_url()."PlaceCtr%2F".$row->place_name."&display=popup&ref=plugin&src=share_button'><span class='fa fa-facebook-square' style='color: #43468C;''></span></a>&nbsp;";

				 	$link_tempat_wisata = str_replace(" ", "%2520", $row->place_name);
				 	echo "<a href='https://plus.google.com/share?url=".base_url()."place%2F".$link_tempat_wisata."' target='_blank'><span class='fa fa-google-plus-square' style='color: #E03F3F;'></span></a>&nbsp;&nbsp;";

				 	echo "<a href='https://www.facebook.com/share.php?u=".base_url()."place%2F".$row->place_name."&title=JAKtrip%3A ".$row->place_name."' target='_blank'><span class='fa fa-facebook-square' style='color: #43468C;' ></span></a>&nbsp;&nbsp;";

				 		
				 	echo "<a href='https://twitter.com/intent/tweet?status=JAKtrip%3A ".$row->place_name."+".base_url()."place%2F".$link_tempat_wisata."' target='_blank'><span class='fa fa-twitter-square' style='color: #2EA0F2;'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;";

				 } ?>

	             <!--a href="#"><span class="fa fa-facebook-square" style="color: #43468C;"></span></a-->&nbsp;

	            </span>

			     <?php 

		            $res = mysql_query("SELECT place_name FROM collection WHERE place_name = '".$thisPlace."' AND username = '".$thisUser."'");

		            if(mysql_num_rows($res)==0){
		            	if(isset($_COOKIE["username"]))
		            	{
		            		echo '<a href="#"> <span class="fa fa-heart icondetail iconcol w-none"></span></a>';

			    			echo '<a href="#"> <span class="fa fa-check-circle icondetail iconcol a-none"></span></a>';
		            	}
		            	else
		            	{
		            		echo '<a href="#"> <span class="fa  icondetail iconcol w-none"></span></a>';

			    			echo '<a href="#"> <span class="fa  icondetail iconcol a-none"></span></a>';
		            	}
			    		

			    	}

			    	else{

		            	foreach($query4 as $row){ 

					    	if($row->is_wishlist==1){

					    		echo '<a href="#"> <span class="fa fa-heart icondetail iconcol w"></span></a>';

					    	}

					    	else if($row->is_wishlist==0){

					    		echo '<a href="#"> <span class="fa fa-heart icondetail iconcol w-none"></span></a>';

					    	}

					    	if($row->is_visited==1){

					    		echo '<a href="#"> <span class="fa fa-check-circle icondetail iconcol a"></span></a>';

					    	}

					    	else if($row->is_visited==0){

					    		echo '<a href="#"> <span class="fa fa-check-circle icondetail iconcol a-none"></span></a>';

					    	}

					    	else{} 	    	

				    	}

					}

			    ?>

			    

			</div><br><br>

			<ul id="main-menu" class="sm sm-clean submenu nav navbar-nav" style="border-top: 1px solid #c4c4c4; margin-left: 15px; width: 1080px;">

				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					&nbsp;&nbsp;&nbsp;</li>

				<li id="inf"><a href="#info" class="submenua" >Information</a></li>

		        <li id="pho"><a href="#photos" class="submenua" >Photos</a></li>

		        <li id="revi"><a href="#reviews" class="submenua" >Reviews</a></li>

			</ul>





			<div class="even isi" >

				<span id="info" style="margin-top: -300px; height: 300px; display: block; visibility: hidden;"></span>

				<section id="infocon" class="textdetail" >

					<div class="col-lg-9">

					<?php foreach($query as $row){

						$lat = $row->lattitude;

						$long = $row->longitude;

						echo "<div id='descr' class='boxinfo'>".nl2br($row->description)."</div>";

						echo "<div class='boxinfo'> <h3><span class='fa fa-ticket'></span><b>&nbsp;&nbsp;&nbsp;Harga Tiket</b></h3>";

						echo "Weekend: Rp ".$row->weekend_price."<br>Weekday: Rp ".$row->weekday_price."</div>";

						echo "<div class='boxinfo'> <h3><span class='fa fa-link'></span><b>&nbsp;&nbsp;&nbsp;Tautan</b></h3>";

						echo "<a href=".$row->link_web.">".$row->link_web."</a>";

						echo "</div>";

						echo "<div class='boxinfo'> <h3><span class='fa fa-map-marker'></span><b>&nbsp;&nbsp;&nbsp;Lokasi Tempat Wisata</b></h3>";

						echo "<div class='infolocation'>";

						echo "<div id='googleMap' style='width:500px;height:380px;'></div>";

						echo "</div>";

						echo "</div>";

					}

					?>

					<button type="button" onclick="calcRoute();">See Route!</button>

					</div>

					

				</section>

				<span id="photos" style="margin-top: -300px; height: 300px; display: block; visibility: hidden;"></span>

				<section id="photoscon" class="textdetail">

					<div class="col-lg-9"><br>

						<button id="addphobtn" class="field btn btn-warning col-lg-11" type="button">ADD NEW PHOTO(S)</button>

						<!--form id="addphoform"-->

						<?php foreach($query as $row){}

						$attributes = array('id' => 'addphoform');

						echo form_open_multipart('PlaceCtr/do_upload/'.$row->place_name, $attributes);?>

							<div class="form-group">

							  <div class="col-lg-9"><br><br>

							  	<label class="control-label">Photos</label>

							  	<?php echo form_error('userfile'); ?>

								<input id="suggestionPhotoFile" type="file" name="userfile[]" size="20" multiple required>

						      </div>

						    </div>

						    <br><br>

						    <div class="form-group">

					 			 <div class="col-lg-10"><br><label class="control-label">Photo Credit</label>

						   		 <input class="form-control" type="text" id="credit" name="credit" title="Leave it blank if the picture you want to upload is originally yours."><br><br>

						   		</div>

						   	</div>

						   	 <div class="col-lg-12">

							<button id="submitPhoto" class="field btn btn-warning" type="submit" value="upload" />SUBMIT</button>

							<hr></div>

						</form>

						<div class="gallery col-lg-12">

						<?php

						foreach($query3 as $row3)

						{

							$location = $row3->pic;

							

							if($row3->is_publish == 1)

							{echo "<div class='pic-thumbnail white'><a href='".base_url($location)."' data-lightbox='".$row3->place_name."' data-title='".$row3->pic_info."'><img src='".base_url($location)."'></a></div>";

							}

							

						}

						?>

							<!--div class="pic-thumbnail">

								<a href="<?php //echo base_url('assets/img/hd.gif')?>"><img src="<?php //echo base_url('assets/img/hd.gif')?>"></a>

							</div>

							<div class="pic-thumbnail">

								<a href="<?php //echo base_url('assets/img/hd.gif')?>"><img src="<?php //echo base_url('assets/img/hd.gif')?>"></a>

							</div>

							<div class="pic-thumbnail">

								<a href="<?php //echo base_url('assets/img/hd.gif')?>"><img src="<?php //echo base_url('assets/img/hd.gif')?>"></a>

							</div>

							<div class="pic-thumbnail">

								<a href="<?php //echo base_url('assets/img/hd.gif')?>"><img src="<?php //echo base_url('assets/img/hd.gif')?>"></a>

							</div-->

						</div>

					</div>

				</section>

				<span id="reviews" style="margin-top: -300px; height: 300px; display: block; visibility: hidden;"></span>

				<section id="reviewscon" class="textdetail" >

					<div class="reviewmember col-lg-9" ><br>

						

						<?php 

							$res = mysql_query("SELECT * FROM rating WHERE place_name = '".$thisPlace."' AND username = '".$thisUser."'");

		            		if(mysql_num_rows($res)==0){

		            			echo '<button id="addrevbtn" class="field btn btn-warning col-lg-11" type="button">ADD NEW REVIEW</button>';

		            			foreach($query as $row){

									$attributes = array('id' => 'addrevform');

									echo form_open('place/'.$row->place_name, $attributes);

									echo '<br><br><div class="formrating form-group"><div class="col-lg-9">';

									echo '<label class="control-label">Rating  <span class="req">*</span></label><br><span class="starRating">';

									echo '<input id="rating5" type="radio" name="rate" value="5"><label for="rating5">5</label><input id="rating4" type="radio" name="rate" value="4"><label for="rating4">4</label><input id="rating3" type="radio" name="rate" value="3"><label for="rating3">3</label><input id="rating2" type="radio" name="rate" value="2"><label for="rating2">2</label><input id="rating1" type="radio" name="rate" value="1"><label for="rating1">1</label></span>';

									echo '</div></div><br><div class="formrating form-group"><div class="col-lg-9">';

									echo '<label class="control-label">Title</label><input class="form-control" type="text" id="title" name="title"></div></div><br><div class="formrating form-group"><div class="col-lg-9"><br>';

									echo '<label class="control-label">Review <span class="req">*</span></label>';

									echo form_error('review');

									echo '<textarea class="form-control" rows="3" id="review" name="review" required></textarea></div></div><br><br><div class="formrating form-group"><div class="col-lg-9"><br>';

									echo '<button class="field btn btn-warning" id="submitrev" name="submitrev" type="submit">SUBMIT</button></div></div><br><br><br><br><br><hr></form>';

									echo '<br><br><br><div id="isi_field" >';

		            			}

		            		}

		            		else{

		            		}

		            		$i=1;

		            		foreach($query as $row2){

		            			foreach($query2 as $row){

		            				$cek = mysql_query("SELECT * FROM rating WHERE username = '".$row->username."'");

		            				$foto = mysql_fetch_array(mysql_query("SELECT pic FROM member WHERE username = '".$row->username."'"));

		            				$numreview = mysql_num_rows($cek);
		            				//--------------editan wildan
		            				$cek_username = mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username = '".$row->username."'"));
		            				if(strpos($cek_username['email'],'facebook')!==false)
		            				{
		            					$display_name =  $cek_username['name'];
		            				}
		            				else
		            				{
		            					$display_name = $cek_username['username'];
		            				}
		            				
									echo "<div class='reviewmember col-lg-12' style='margin-left: -30px;'>";				
									echo "<a href='".base_url()."profile/".$row->username."'>";
									echo "<div class='reviewkiri col-lg-4'>";

									echo "<div class='col-lg-12'><div class='pic-small' style='margin-left:65px; margin-bottom: 10px; margin-top: 10px;'><img src='".$foto['pic']."'/></div></div>";

									echo "<div class='col-lg-12'><div class='author' ><b>".$display_name."</b></div>";
									echo "</a>";
									echo "<div class='hasreviewed'>Reviewed ".$numreview." places</div></div>";

									echo "</div>";

									echo "<div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'>";

										if ($row->rate == 0)

									    {echo "<span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span>";}

										if ($row->rate == 1)

										{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}

										if ($row->rate == 2)

										{echo"<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}

										if ($row->rate == 3)

										{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}

										if ($row->rate == 4)

										{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span>";}

										if ($row->rate == 5)

										{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span>";}



									$res2 = mysql_query("SELECT * FROM member WHERE username = '".$thisUser."' AND is_admin = 1");

									if(mysql_num_rows($res2)==0){

										echo	"<a href='#flag".$i ."' onclick=".base_url('place/report')."><span class='close fa fa-flag' value=".$row->username."></span></a>";	

										echo 	"<div id='flag".$i ."' class='openModal2'>";

										echo 	"<div>";

										echo 	"<center><div class='tuffyh3a'>I want to report this review!</div></center><br>";

										echo	"<br>";

										echo 	"<div class='flagcontent'>";

										echo 	"Reasons :<br>";

										echo  	"<form name ='userinput' action='../PlaceCtr/spamreport/".$row->id_rate ."/".$row2->place_name ."' method='post'>";

										echo       	"<input type='checkbox' id='spamreason' name='spamreason[]' value='spam'>&nbsp;&nbsp;Spam<br>";

										echo       	"<input type='checkbox' id='spamreason' name='spamreason[]' value='false_statement'>&nbsp;&nbsp;False Statement<br>";

										echo      	"<input type='checkbox' id='spamreason' name='spamreason[]' value='unrelated_content'>&nbsp;&nbsp;Unrelated Content<br>";

										echo     	"<input type='checkbox' id='spamreason' name='spamreason[]' value='profanity'>&nbsp;&nbsp;Profanity<br>";

										echo    	"<input type='checkbox' id='spamreason' name='spamreason[]' value='nudity'>&nbsp;&nbsp;Nudity<br><br>";

										echo   	"<div class='row'><br><br><br>";

										echo    "<a href='#close' class='btn btn-primary' style='margin-right: -60px; margin-left: 100px;'>cancel</a>";

										echo    "<button type='submit' class='pull-right btn btn-warning' style='margin-right: 20px;'>send</button>";

										echo	"</div>";

										echo	"</form>";

										echo 	"</div>";

										echo 	"</div>";

										echo 	"</div>";

										$i=$i+1;

									}

									else{

										echo	"<a href='javascript:deleteFunction(".'"'.$row->id_rate.'","'.$row->place_name.'"'.")' onclick='return confirm(\"Are you sure?\")'><span class='deleterev close fa fa-trash-o' id='nilaiid' value=''></span></a>";	

									}

									echo	"<br>";

								    echo	"<span class='judulreview tuffyh3a' id='judul'>"	;													

									echo 	"<p>".$row->title."</p>" ;																

									echo	"</span>";

								    echo	"<span class='isireview' id='isireview'>";

									echo 	"<p>".$row->review."</p>" ;		

								    echo	"</span>";

									echo	"</div>";

									echo	"</div>";

		            			}

							}

						 ?>

						

						

						</div>



				</section>

				 </div>

			</div>

			<div class="col-lg-1"></div>

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



<script type="text/javascript">



$('#suggestionPhotoFile').bind('change', function() {



  /*author wildan*/

  var ukuran = bytesToSize(this.files[0].size).split(" ");

  if((parseInt(ukuran[1])==2 && parseFloat(ukuran[0])>=2.0) || parseInt(ukuran[1])>2)

  {

  	alert("Your photo must less than 2 MB");

  	document.getElementById("submitPhoto").disabled = true;

  }

  else

  {

  	document.getElementById("submitPhoto").disabled = false;

  }

  



});



function bytesToSize(bytes) {

	/*author wildan ambil dari internet*/

    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];

    if (bytes == 0) return 'n/a';

    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));

    if (i == 0) return bytes + ' ' + sizes[i]; 

    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + i;

};

$(document).ready(function() {

	$("span.iconcol").click(function(){

		if(getCookie("username")=="")
	    {
	      window.open('#openLogin', '_self');
	    }
	    else
	    {
	    	//-----------------------------------
			if($(this).hasClass("w-none")){

				$(this).removeClass("w-none");

				$(this).addClass("w");

				setTimeout(function () {

					location.href='../PlaceCtr/addWishlist/<?php echo $thisPlace; ?>';

				}, 3500); 

				notifAddWishlist();

			}

			else if($(this).hasClass("w")){

				var c = confirm("Are you sure you want to remove this from your wishlist?");

				if(c==true){

					$(this).removeClass("w");

					$(this).addClass("w-none");

					setTimeout(function () {

						location.href='../PlaceCtr/removeWishlist/<?php echo $thisPlace; ?>';

					}, 3500); 

					notifDelWishlist();

				}

			}

			else if($(this).hasClass("a-none")){

				$(this).removeClass("a-none");

				$(this).addClass("a");

				setTimeout(function () {

					location.href='../PlaceCtr/addVisited/<?php echo $thisPlace; ?>';

				}, 3500); 

				notifAddAchievement();

			}

			else if($(this).hasClass("a")){

				var c = confirm("Are you sure you want to remove this from your visited?");

				if(c==true){

					$(this).removeClass("a");

					$(this).addClass("a-none");

					setTimeout(function () {

						location.href='../PlaceCtr/removeVisited/<?php echo $thisPlace; ?>';

					}, 3500); 

					notifDelAchievement();

				}

			}			

			else{}	
			//----------------------------
	    }

	});

});

</script>