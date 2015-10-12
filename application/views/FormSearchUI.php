

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div class="col-lg-6">
     
     <div class="row">
       <div class="searchbox">
         <form class="form-horizontal " >
           <div class="form-inline">
             <label class="col-lg-2 control-label">Going from </label>
             <span id="ddcontainer" class="fieldsml custom-dropdown ">
              <select id="ddbus" class="fieldsml form-control" title="Nearest bus stop?">    
                 <option value="" selected disabled>Nearest bus stop?</option>
                    <?php
                    echo "<option id='goingFrom' value=\"".$_COOKIE["halteAwal"]."\" selected>Halte ".$_COOKIE["halteAwal"]."</option>";
                   
                    ?>
              </select>
             </span>

             <span class="input-group col-lg-3">
              <span class="fieldsml input-group-addon">Rp</span>
              <input id="input_price" class="fieldsml form-control" type="text" style="width: 93%;" value="<?php if(isset($_COOKIE['budget'])) {echo $_COOKIE['budget'];} ?>" placeholder="Budget" readonly>
            </span>

            <span class="input-group col-lg-3">
              <input class="fieldsml datepicker" type="text" placeholder="Date" id="sisaBudget" style="margin-left: 2px;" value=<?php echo $_COOKIE['datechoosen'] ?> readonly>
              </span>
          </div>

         </form>


       </div>

       <div class="searchres">
         <div class="row">
           <div class="col-lg-5 result">Show all places in Jakarta</div>
           <div class="col-lg-2"></div>
         
          
           <div class="col-lg-11" id="blogMain">
              <?php

             
               if($isRekomendasi == "true")
               {
                     $counter = 0;
                    $ticketprice = 0;
                      echo "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;'>";
                  foreach ($query['result'] as $row) {
                    # code...
                    
                    if($isWeekend == "true")
                    {
                      $ticketprice = $row->weekend_price;
                      
                    }
                    else
                    {
                      $ticketprice = $row->weekday_price;
                    }
                    $place_info = "";
                    if($row->place_info==null)
                    {
                      $place_info = "null";
                    }
                    else
                    {
                      $place_info = $row->place_info;
                    }
                    if($budget>=$query['harga'][$counter])
                    {
                      echo "<tr onclick='javascript:showRating(".$row->place_name.")'>";
                      $link_place = "place/".$row->place_name;
                      if($row->pic_thumbnail==NULL || $row->pic_thumbnail==""){
                        echo "<td><a href='".base_url($link_place)."'><div class='pic150'><img src='".base_url('assets/img/noimg.png')."'></div></a></td>";
                        $pic_thumbnail_show = base_url('assets/img/noimg.png');
                       }
                       else{
                          echo "<td><a href='".base_url($link_place)."'><div class='pic150'><img src='".base_url($row->pic_thumbnail)."'></div></a></td>";
                          $pic_thumbnail_show = base_url($row->pic_thumbnail);
                       }
                          echo "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/JAKtrip/place/".$row->place_name."\" style='color: #1c1c1c;'>".$row->place_name."</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('".$row->place_name."')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp ".$query['harga'][$counter]." - ".$row->city."</span><br>".$query['hargaBusway'][$counter]." (harga busway) + ".$row->transport_price." (harga angkot) + ".$ticketprice." (harga tiket)<br><br><button class='btn btn-warning' onclick=\"addTripRec('".$row->place_name."','".$row->halte_name."','".$query['hargaBusway'][$counter]."','".$row->transport_price."','".$ticketprice."','".$query['harga'][$counter]."','".$row->transport_info."','".$place_info."','".$pic_thumbnail_show."')\">ADD TO TRIP</button><br></td>";
                        echo "</tr>";  
                      }
                      
                     $counter++;
                  
                  }
                  echo "</table>";
               }
               else
               {
                   $counter = 0;
                   $ticketprice = 0;
                      echo "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;'>";
                    foreach ($query['result'] as $row) {
                      # code...
                      
                      if($isWeekend == "true")
                      {
                        $ticketprice = $row->weekend_price;
                        
                      }
                      else
                      {
                        $ticketprice = $row->weekday_price;
                      }

                      $place_info = "";
                      if($row->place_info==null)
                      {
                        $place_info = "null";
                      }
                      else
                      {
                        $place_info = $row->place_info;
                      }
                   $link_place = "place/".$row->place_name;
                   echo "<tr onclick='javascript:showRating(".$row->place_name.")'>";
                   if($row->pic_thumbnail==NULL || $row->pic_thumbnail==""){
                      $pic_thumbnail_show = base_url('assets/img/noimg.png');
                      echo "<td><a href='".base_url($link_place)."'><div class='pic150'><img src='".base_url('assets/img/noimg.png')."'></div></a></td>";
                   }
                   else{
                      $pic_thumbnail_show = base_url($row->pic_thumbnail);
                      echo "<td><a href='".base_url($link_place)."'><div class='pic150'><img src='".base_url($row->pic_thumbnail)."'></div></a></td>";
                   }
                       
                        echo "<td height='20px' class='tuffyh3a'><a href=\"http://localhost/JAKtrip/place/".$row->place_name."\" style='color: #1c1c1c;'>".$row->place_name."</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('".$row->place_name."')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp ".$query['harga'][$counter]." - ".$row->city."</span><br>".$query['hargaBusway'][$counter]." (harga busway) + ".$row->transport_price." (harga angkot) + ".$ticketprice." (harga tiket)<br><br><button class='btn btn-warning' onclick=\"addTrip('".$row->place_name."','".$row->halte_name."','".$query['hargaBusway'][$counter]."','".$row->transport_price."','".$ticketprice."','".$query['harga'][$counter]."','".$row->transport_info."','".$place_info."','". $pic_thumbnail_show."')\">ADD TO TRIP</button><br></td>";
                      echo "</tr>"; 
                       
                        $counter++;
                    }
                    echo "</table>";
               }

               
             
            ?>
             
           </div>


         </div>
       </div>
     </div>

    </div>
     
    <div id="successAddNotify" class="openModalNotify">
        <div class="alert alert-success" role="alert"><a href="#close" title="Close" class="close"><span class="fa fa-times"></span></a> <p>You success adding your trip</p> </div>
    </div>
    <div id="successDeleteNotify" class="openModalNotify">
        <div class="alert alert-danger" role="alert"><a href="#close" title="Close" class="close"><span class="fa fa-times"></span></a><p>You success delete your trip</p> </div>
    </div>

     <div class="col-lg-6 collapse in width"  id="mapcanvas">
    </div>
