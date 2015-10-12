<!--
author: Syifa Khairunnisa

Menampilkan list promo untuk user
-->

<div class="row" style="background-color: #fff">
	<div class="col-lg-12">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<div class="headerdetail"><img src="<?php echo base_url('assets/img/header.jpg');?>"/></div>
			<div class="col-lg-1"></div>
			<div class="col-lg-10" style="margin-top: -15px; margin-left: 8px;">
				<span class="tuffyh2a" style="margin-top: 5px;">
					<?php foreach($query as $row){
						echo $row->title;
						echo " di ";
						echo $row->place_name;
					}
					?>
				</span>&nbsp;&nbsp;&nbsp;&nbsp;
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span style="font-size: 24px;">&nbsp;
					<?php foreach($query as $row){ 
					 	echo "<a href='https://plus.google.com/share?url=".base_url()."place%2F".$row->place_name."'><span class='fa fa-google-plus-square' style='color: #E03F3F;'></span></a>&nbsp;&nbsp;";
					 	echo "<a href='https://www.facebook.com/share.php?u=".base_url()."place%2F".$row->place_name."&title=JAKtrip%3A ".$row->place_name."'><span class='fa fa-facebook-square' style='color: #43468C;'></span></a>&nbsp;&nbsp;";
					 	echo "<a href='https://twitter.com/intent/tweet?status=JAKtrip%3A ".$row->place_name."+".base_url()."place%2F".$row->place_name."'><span class='fa fa-twitter-square' style='color: #2EA0F2;'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;";
					} ?>
	            	&nbsp;
	            </span>
			    <span class="fa fa-check-circle icondetail iconcol a-none"></span>
			    <span class="fa fa-heart icondetail iconcol w-none"></span>
			    
			</div><br><br>
			<ul id="main-menu" class="sm sm-clean submenu nav navbar-nav detail" style="border-top: 1px solid #c4c4c4; margin-left: 15px;">
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
							echo "<div class='boxinfo'> <h3><span class='fa fa-calendar'></span><b>&nbsp;&nbsp;&nbsp;Tanggal Berlaku</b></h3>";
							echo "Dari ".$row->start_date." hingga ".$row->end_date."</div>";
						} ?>
					</div>
					
				</section>
			</div>
			<div class="col-lg-1"></div>
		</div>
	</div>
</div>