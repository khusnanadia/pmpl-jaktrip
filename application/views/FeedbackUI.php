
			<div class="col-lg-8">
				<div class="tuffyh2a admintitle">Feedback</div>
				
				<span id="openLogin" class="newpost" >
				<table id="tab1" class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <!-- th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th -->
				   
				      <th>Name</th>
				      <th>E-mail</th>
				      <th>Subject</th>
				      <th>Message</th>
				    </tr>
				  </thead>
				  <tbody>
				  		<?php
							foreach($query as $row)
							{
							echo "<tr>";
							//echo"<td><input type='checkbox' value=''></td>";
							
							echo "<td>".$row->name."</td>";
							echo "<td>".$row->email	."</td>";
							echo "<td>".$row->subject."</td>";
							echo "<td>".$row->message."</td>";
							echo "</tr>";
							}
						?>
				  		
				  </tbody>
				</table><br>
			</span>
			<!--	<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul><br>-->
				<div style="height: 100px"></div>
			</div>


			
		</div>
	</div>