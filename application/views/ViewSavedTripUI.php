

	<div class="container-fluid">
		<div class="col-lg-6" >
			<div class="tuffyh2a viewbox">View Trip</div>
			<div style="margin-left: 40px; margin-bottom: 80px;">
				<?php
				// echo json_encode($place_name);
				// echo json_encode($place_info);
				// echo json_encode($total_price);
				// echo json_encode($transport_info);
				$indexpertamaKali = -1;
				for($k=0; $k<count($place_name)-1; $k++)
				{
					if((strcmp($place_name[$k], "terhapus")  != 0))
					{
						$indexpertamaKali = $k;
						$k = $k<count($place_name)-1;
					}
				}
				if($indexpertamaKali == -1)
				{
					echo "<p>Anda belum menambahkan trip.</p>";
				}
				else
				{

					if((strcmp($is_visited[$indexpertamaKali], "1")  == 0))
					{
						$hasvisited = '<span class="fa fa-check-circle icondetail iconcol a"></span>';
						$linkSetVisited = base_url("user/trip/unsetvisited/".$id_place_name[$indexpertamaKali]."/".$id_trip);
					}
					else
					{
						$hasvisited = '<span class="fa fa-check-circle icondetail iconcol a-none"></span>';
						$linkSetVisited = base_url("user/trip/setvisited/".$id_place_name[$indexpertamaKali]."/".$id_trip);
					}
					$link_place = "place/".$place_name[$indexpertamaKali];

					echo "<table style='margin-bottom: 10px;'>";
					echo "<tr>";
					echo "<td rowspan='5' style='background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px'></td>";
					echo "<td rowspan='5'><a href='".base_url($link_place)."'><div class='pic150' style=\"margin-left: 20px;\"><img src='".$pic_thumbnail[$indexpertamaKali]."' style=\"margin: 0px;\"/></div></a></td>";
					echo "<td height='30px' width='350px' class='tuffyh3a'>".$place_name[$indexpertamaKali]."</td><td><a href=".$linkSetVisited.">".$hasvisited."</a></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td height='30px'>Rp ".$total_price[$indexpertamaKali]."</td>";
					echo "</tr>";
					echo "<tr> <td>";
					echo "1. Dimulai dari halte ".$halte_awal[0].",";
					if((strcmp($halte_awal[0], $halte_name[$indexpertamaKali])  == 0))
					{
						echo $transport_info[$indexpertamaKali]." menuju ".$place_name[$indexpertamaKali];
					}
					else
					{
						echo " naik busway ke halte ".$halte_name[$indexpertamaKali].", lalu ".$transport_info[$indexpertamaKali]." menuju ".$place_name[$indexpertamaKali];
					}
					
					
					echo "</td></tr>";
					echo "</table>";

					for($i=$indexpertamaKali+1; $i<(count($place_name)-1); $i++)
					{

					//	echo (count($place_name)-1);
					//	echo $i;
						
						if($place_name[$i] != "terhapus" && $i>0)
						{
							
							if((strcmp($is_visited[$i], "1")  == 0))
							{	$hasvisited = '<span class="fa fa-check-circle icondetail iconcol a"></span>'; 
								$linkSetVisited = base_url("user/trip/unsetvisited/".$id_place_name[$i]."/".$id_trip); 
							}
							else
							{
								$hasvisited = '<span class="fa fa-check-circle icondetail iconcol a-none"></span>';
								$linkSetVisited = base_url("user/trip/setvisited/".$id_place_name[$i]."/".$id_trip); 
							}
							$link_place = "place/".$place_name[$i];
							echo "<table style='margin-bottom: 10px;'>";
							echo "<tr>";
							echo "<td rowspan='5' style='background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px'></td>";
							echo "<td rowspan='5'><a href='".base_url($link_place)."'><div class='pic150' style=\"margin-left: 20px;\"><img src='".$pic_thumbnail[$i]."' style=\"margin: 0px;\"/></div></a></td>";
							echo "<td height='30px' width='350px' class='tuffyh3a'>".$place_name[$i]."</td><td><a href=".$linkSetVisited.">".$hasvisited."</a></td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td height='30px'>Rp ".$total_price[$i]." </td>";
							echo "</tr>";
							echo "<tr> <td>";
							$indexSebelum = -1;
							for($j=($i-1); $j >= 0; $j--)
							{
								// echo $i;
								// echo ($i-1);
								if((strcmp($place_name[$j], "terhapus")  != 0))
								{
									$indexSebelum = $j;
									$j = -1;

								}
				//				echo $indexSebelum;
				//				echo $i;

								
							}

							if( (strcmp($place_info[$i], $place_info[($indexSebelum)])  == 0) && $indexSebelum != (-1) && (strcmp($place_info[$i], "null")  != 0))
							{
								echo "1. Jalan kaki saja menuju ".$place_name[$i];
							}
							// if((strcmp($place_info[$i], $place_info[($indexSebelum)])  == 0) && $indexSebelum != (-1))
							// {
							// 	echo "<br>1jalan kaki saja menuju ".$place_name[$i];
							// }
							else if((strcmp($halte_name[$i], $halte_name[($indexSebelum)])  == 0) && $indexSebelum != -1)
							{
								echo "1. ".$transport_info[($indexSebelum)]." menuju halte ".$halte_name[($indexSebelum)];
								echo "<br>2. ".$transport_info[$i]." menuju ".$place_name[$i];	
							}
							else if($indexSebelum != -1)
							{
								echo "1. ".$transport_info[($indexSebelum)]." menuju halte ".$halte_name[($indexSebelum)];
								echo "<br>2. Naik busway dari halte ".$halte_name[($indexSebelum)]." menuju halte ".$halte_name[$i];
								echo "<br>3. ".$transport_info[$i]." menuju ".$place_name[$i];	
							}
							
						//	echo "<td valign='top' rowspan='3' height='90px'>1. Naik busway dmwdmwd odwdijwqodj <br>2. Jalan kaki 0.4 km ke arah barat</td>";
							
							echo "</td></tr>";
							echo "</table>";
						}
					
					}
					
				}
				

				?>
				<!--table style="margin-bottom: 10px;">
					<tr>
						<td rowspan="5" style="background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px"><b>1</b></td>
						<td rowspan="5"><img src="../assets/img/150.jpg"/></td>
						<td height="30px" class="tuffyh3a">Ice Age Arctic Adventure</td>
					</tr>
					<tr>
						<td height="30px">Rp 25000 - 15 min - Indoor Play</td>
					</tr>
					<tr>
						<td valign="top" rowspan="3" height="90px">1. Naik busway dmwdmwd odwdijwqodj <br>2. Jalan kaki 0.4 km ke arah barat</td>
					</tr>
				</table>

				<table style="margin-bottom: 10px;">
					<tr>
						<td rowspan="5" style="background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px"><b>2</b></td>
						<td rowspan="5"><img src="../assets/img/150.jpg"/></td>
						<td height="30px" class="tuffyh3a">Ice Age Arctic Adventure</td>
					</tr>
					<tr>
						<td height="30px">Rp 25000 - 15 min - Indoor Play</td>
					</tr>
					<tr>
						<td valign="top" rowspan="3" height="90px">1. Naik busway dmwdmwd odwdijwqodj <br>2. Jalan kaki 0.4 km ke arah barat</td>
					</tr>
				</table-->
			</div>
			<?php
			echo "<div class='total'>";
			$harga = 0;
			for($i=0; $i<count($total_price)-1; $i++)
			{
				if((strcmp($place_name[$i], "terhapus")  != 0))	
				{
					$harga = $harga + intval($total_price[$i]);
				}
				
			}
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total : Rp ".$harga."<br>";
			echo "</div>";
			?>
			
			
			<a href="<?php if(isset($_COOKIE['username'])){echo base_url('user');}else{echo '#openLogin';} ?>"><button class="btn btn-warning" type="submit" style="font-size: 14px; margin-bottom: 80px; float: right; margin-right: 40px;">BACK TO USER PAGE</button></a>
		</div>

		
		
		

	<div class="col-lg-6"></div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$("span.iconcol").click(function(){
		if($(this).hasClass("a-none")){
			$(this).removeClass("a-none");
			$(this).addClass("a");
			notifAddAchievement();
		}
		else if($(this).hasClass("a")){
			var c = confirm("Are you sure you want to remove this from your visited?");
			if(c==true){
				$(this).removeClass("a");
				$(this).addClass("a-none");
				notifDelAchievement();
			}
		}			
		else{}	
	});
});
</script>