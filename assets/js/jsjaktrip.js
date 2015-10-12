$(document).ready(function () {
        showTheItinerary1();
        var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate());

        $('.datepicker').datepicker({
            format: "mm/dd/yyyy",
            startDate: "today",
            todayHighlight: true
        });  

    });
var baseurl = "http://jaktrip.net/JAKtrip/";
$(function() {
      $('#main-menu').smartmenus();
    });

        // $('.navbar-nav > li > a').click(function(event){
        //  //event.preventDefault();//stop browser to take action for clicked anchor 
          
        //  //get displaying tab content jQuery selector
        //  var active_tab_selector = $('.navbar-nav > li.active > a').attr('href');          
          
        //  //find actived navigation and remove 'active' css
        //  var actived_nav = $('.navbar-nav > li.active');
        //  actived_nav.removeClass('active');

        //  //add 'active' css into clicked navigation
        //  $(this).parents('li').addClass('active');
          
        //  //hide displaying tab content
        //  $(active_tab_selector).removeClass('active');
        //  $(active_tab_selector).addClass('hide');
          
        //  //show target tab content
        //  var target_tab_selector = $(this).attr('href');
        //  $(target_tab_selector).removeClass('hide');
        //  $(target_tab_selector).addClass('active');
        // });
       $("#faqs dd").hide();
        $("#faqs dt").click(function () {
            $(this).next("#faqs dd").slideToggle(500);
            $(this).toggleClass("expanded");
        });

  $("#tab1 #checkAll").click(function () {
          if ($("#tab1 #checkAll").is(':checked')) {
              $("#tab1 input[type=checkbox]").each(function () {
                  $(this).prop("checked", true);
              });

          } else {
              $("#tab1 input[type=checkbox]").each(function () {
                  $(this).prop("checked", false);
              });
          }
      });

    $(function () {
      var budgetmax = $("#input_price").val();
        $(".range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 500000,
            from: 0,
            to: budgetmax,
            type: 'double',
            step: 500,
            prefix: "Rp ",
            grid: true
        });

    });

    //----maps------------------------------
      function initialize() {
        var mapCanvas = document.getElementById('mapcanvas');
        var mapOptions = {
          center: new google.maps.LatLng(-6.190035, 106.838075),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(mapCanvas, mapOptions);

        jQuery.ajax({
              type: "POST",
              url: baseurl+"index.php/tesController/getAll",
              success: function(res) {
                  if (res)
                  { 
                    var obj = jQuery.parseJSON(res);
                  var hasilPemilihan = "";
                  var infoWindow = new google.maps.InfoWindow();
                    for(var i = 0; i<obj.query.length; i++)
                    {
                    
                    var tempplace_name = obj.query[i].place_name;
                    var templongitude = obj.query[i].longitude;
                    var templattitude = obj.query[i].lattitude;
                    
                    AllTourAttr.push(tempplace_name);
                    var location = new google.maps.LatLng(parseFloat(templongitude),parseFloat(templattitude));
                
                      var marker = new google.maps.Marker({
                    position: location,
                    html: "<a>" + obj.query[i].place_name + "</a>"

                  });

           
                

                      google.maps.event.addListener(marker, 'click', function () {
                         
                         infoWindow.setContent(this.html);
                         infoWindow.open(map, this);

                      });

                      gmarkers.push(marker);
                      marker.setMap(map);

                    }
                  }
                  }
              });
      }
      function setMapLocationZoom(tourAttr)
    {
      $('[data-toggle="popover"]').popover('hide');
      var indexToZoom = searchIndexListTourAttr(tourAttr);
      
      map.setCenter(gmarkers[indexToZoom].position);
      if(indexMarkerChoosen != -1)
      {
        gmarkers[indexMarkerChoosen].setAnimation(null);
      }
      gmarkers[indexToZoom].setAnimation(google.maps.Animation.BOUNCE);
      indexMarkerChoosen = indexToZoom;
      google.maps.event.trigger(gmarkers[indexToZoom], 'click');
        map.setZoom(15);
    }

    function resetMaps()
    {
      var myCenter = new google.maps.LatLng(-6.195456, 106.822229);
      map.setCenter(myCenter);
    //  alert(indexMarkerChoosen);
      if(indexMarkerChoosen != -1)
      {
        gmarkers[indexMarkerChoosen].setAnimation(null);
      }
      indexMarkerChoosen = -1;

      map.setZoom(11);
    }
    function searchIndexListTourAttr(tourAttr)
      {
        
        
        for(var i = 0; i< AllTourAttr.length; i++)
        {
          
          if(AllTourAttr[i]==tourAttr)
          {
            
            return i;
          } 
        }
        
      }
      google.maps.event.addDomListener(window, 'load', initialize);
      var map;
      var arrayTripChoosen = [];
    var arrayTripPriceChoosen =[];
    var tripCost = 0;
    var AllTourAttr = [];
    var gmarkers = [];
    var indexMarkerChoosen = -1;
    var current_halte = ":P";
    var arrayTransport_info = [];
    var countTrip = 0;
    var arrayHalteChoosen = [];
    var indexCurrentHalte = -1;
    var arrayIsJalan = [false,false,false,false,false,false];
    var arrayPlaceInfo = [];
    var arrayAngkotBefore = [];
    var firstHalte = "";
      

    function collapseMap()
    {
      $("#mapcanvas").hide();
  //    alert("ya");
    }
    
    function addTrip(place_name1, halte_name1, busway_price1, angkot_price1, ticket_price1, total_price1, transport_info1, place_info1, pic_thumbnail_show1)
        {
       //   alert("nama tempat : " + place_name1 +"<br>nama halte : "+halte_name1+"<br>busway : "+busway_price1+"<br>angkot : "+angkot_price1 + "<br>tiket : " + ticket_price1+"<br>total :"+total_price1);
             // alert("ayayaya");

            var place_name =  getCookie("placeName");
            var halte_name = getCookie("halteName");
            var busway_price = getCookie("buswayPrice");
            var angkot_price = getCookie("angkotPrice");
            var ticket_price = getCookie("ticketPrice");
            var total_price = getCookie("totalPrice");
            var transport_info = getCookie("transportInfo");
            var place_info = getCookie("placeInfo");
            // var baseurl = 'http://localhost/JAKtrip/';
            tempdata = place_name1 + "--" +halte_name1+ "--"+busway_price1+ "--"+angkot_price1+ "--"+ticket_price1+ "--"+total_price1+ "--"+transport_info1+ "--"+ place_info1 + "--" + pic_thumbnail_show1;
            
           // alert(pic_thumbnail_show1);
            
           
             jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  tempdata},
              url: baseurl + "index.php/searchCtr/addingTrip/",
              success: function(res) {
                  if (res)
                  {
                    
                    var output = getCookie("placeName").replace(/\+/gi, " ");
          //          alert(res);
                   var obj = jQuery.parseJSON(res);

             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;'>";
                   
                     for(var i = 0; i<obj.query.result.length; i++)
                    {
                      
                        var ticketPrice = 0; 
                        var isWeekend = getCookie("isWeekend");
                        // alert(isWeekend);
                        if(isWeekend == "true")
                        {

                          ticketPrice = obj.query.result[i].weekend_price;
                          
                        }
                        else
                        {
                          ticketPrice = obj.query.result[i].weekday_price;
                        }

                        
                        if(obj.query.sudahDipilih[i] == true)
                        {
                          var pic_thumbnail_show = ""; 
                          var link_place = "place/"+obj.query.result[i].place_name; 
                          output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                          if(obj.query.result[i].pic_thumbnail==null || obj.query.result[i].pic_thumbnail==""){
                            output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+"assets/img/noimg.png'></div></a></td>";
                            pic_thumbnail_show = baseurl+"assets/img/noimg.png";
                          }
                          else{
                            output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+obj.query.result[i].pic_thumbnail+"'></div></a></td>";
                            pic_thumbnail_show = baseurl+obj.query.result[i].pic_thumbnail;
                          }

                           
                     

                        output = output + "<td height='20px' class='tuffyh3a'><a href=\""+baseurl+"place/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('"+obj.query.result[i].place_name+"')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br>";
                          output = output + "<button class='btn btn-warning disabled' onclick=\"addTrip('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"','"+pic_thumbnail_show+"')\">ADD TO TRIP</button><br>";
               
                          // <a href=\"http://localhost/JAKtrip/place/"+obj.query.result[i].place_name+"\">see details</a></td>";
                          output = output + "</tr>";
                        }
                        else
                        {
                            var pic_thumbnail_show = "";
                            var link_place = "place/"+obj.query.result[i].place_name;
                           output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                            if(obj.query.result[i].pic_thumbnail==null || obj.query.result[i].pic_thumbnail==""){
                              output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+"assets/img/noimg.png'></div></a></td>";
                              pic_thumbnail_show = baseurl+"assets/img/noimg.png";
                            }
                            else{
                              output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+obj.query.result[i].pic_thumbnail+"'></div></a></td>";
                              pic_thumbnail_show = baseurl+obj.query.result[i].pic_thumbnail;
                            }
                        output = output + "<td height='20px' class='tuffyh3a'><a href=\""+baseurl+"place/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('"+obj.query.result[i].place_name+"')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br>";
                          output = output + "<button class='btn btn-warning' onclick=\"addTrip('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"','"+pic_thumbnail_show+"')\">ADD TO TRIP</button><br>";
                          // <a href=\"http://localhost/JAKtrip/place/"+obj.query.result[i].place_name+"\">see details</a></td>";
                          output = output + "</tr>";
                        }
                            
                        
                    }
                    output = output+ "</table>";
                 //   alert(output);
                   $("#blogMain").html(output);
                    $("#goingFrom").html(place_name1);
                   showTheItinerary1();

                  /*---buat nampilin notif------*/
                  window.open('#successAddNotify', '_self');
                  setTimeout(function(){
                    window.open('#close', '_self');
                    $('[data-toggle="popover"]').popover('show');
                    }, 1500);
                  /*---end of buat nampilin notif------*/
                  }
                  }
                });
        }

        function addTripRec(place_name1, halte_name1, busway_price1, angkot_price1, ticket_price1, total_price1, transport_info1, place_info1, pic_thumbnail_show1)
        {
       
   //         alert("aja");
            var place_name =  getCookie("placeName");
            var halte_name = getCookie("halteName");
            var busway_price = getCookie("buswayPrice");
            var angkot_price = getCookie("angkotPrice");
            var ticket_price = getCookie("ticketPrice");
            var total_price = getCookie("totalPrice");
            var transport_info = getCookie("transportInfo");
            var place_info = getCookie("placeInfo");
            var budget = getCookie("budget");
            var idx_last_trip = getCookie("idxLastTrip");
            // var baseurl = 'http://localhost/JAKtrip/';
            var sisaBudget = parseInt(budget)-parseInt(total_price1);
            tempdata = place_name1 + "--" +halte_name1+ "--"+busway_price1+ "--"+angkot_price1+ "--"+ticket_price1+ "--"+total_price1+ "--"+transport_info1+ "--"+ place_info1+"--"+sisaBudget+"--"+pic_thumbnail_show1;
      
          
     //      alert(budget);
             jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  tempdata},
              url: baseurl+"index.php/searchCtr/addingTripRec/",
              success: function(res) {
                  if (res)
                  {

                    var output = getCookie("placeName").replace(/\+/gi, " ");
                    // alert(res);

                   var obj = jQuery.parseJSON(res);

             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;'>";
                      var sudahHabis = true;
                     for(var i = 0; i<obj.query.result.length; i++)
                        {
                            var ticketPrice = 0; 
                            var isWeekend = getCookie("isWeekend");
                            // alert(isWeekend);
                            if(isWeekend == "true")
                            {

                              ticketPrice = obj.query.result[i].weekend_price;
                              
                            }
                            else
                            {
                              ticketPrice = obj.query.result[i].weekday_price;
                            }
                            if(obj.query.sudahDipilih[i] != true && sisaBudget >= obj.query.harga[i])
                            {
                    //          alert(obj.query.harga[i] + " " + sisaBudget);
                              sudahHabis = false;
                              

                              output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                               var pic_thumbnail_show = ""; 
                               var link_place = "place/"+obj.query.result[i].place_name;

                              if(obj.query.result[i].pic_thumbnail==null || obj.query.result[i].pic_thumbnail==""){
                                output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+"assets/img/noimg.png'></div></a></td>";
                                pic_thumbnail_show = baseurl+"assets/img/noimg.png";
                              }
                              else{
                                output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+obj.query.result[i].pic_thumbnail+"'></div></a></td>";
                                pic_thumbnail_show = baseurl+ obj.query.result[i].pic_thumbnail;
                              }
                              output = output + "<td height='20px' class='tuffyh3a'><a href=\""+baseurl+"place/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('"+obj.query.result[i].place_name+"')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><button class='btn btn-warning' onclick=\"addTripRec('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"','"+pic_thumbnail_show+"')\">ADD TO TRIP</button><br></td>";
                              output = output + "</tr>";
                            
                            }
                            else
                            {
                              
                            }
                            
                        }
                    if(sudahHabis)
                    {
                      output = output + "<p>You don't have enough money to add new trip</p>";
                    }
                    output = output+ "</table>";
                 //   alert(output);
                   $("#blogMain").html(output);
                   $("#goingFrom").html(place_name1);
                   $("#input_price").val(sisaBudget);
                   showTheItinerary1();

                   /*---buat nampilin notif------*/
                  window.open('#successAddNotify', '_self');
                  setTimeout(function(){
                    window.open('#close', '_self');
                    $('[data-toggle="popover"]').popover('show');
                    }, 1500);
                  /*---end of buat nampilin notif------*/
                  }
                  }
                });
        }

        function showTheItinerary1()
        {

          var itineraryPlace = getCookie("placeName").replace(/\+/gi, " ");
          var itineraryPlaceArray = itineraryPlace.split("xx");
          var itineraryTotalPrice = getCookie("totalPrice").replace(/\+/gi, " ");
          var itineraryTotalPriceArray = itineraryTotalPrice.split("xx");
          var pic_thumbnail =  decodeURIComponent(getCookie("list_pic_thumbnail"));
          var pic_thumbnail_array = pic_thumbnail.split("xx"); 
          var LastCounterTrip = parseInt(getCookie("counterTrip"));
          var yangDipilih = "";
          // var baseurl = 'http://localhost/JAKtrip/';
          
          yangDipilih = yangDipilih + "<table class='table' style='color: #1c1c1c !important;'><tr><th style='font-size: 16px;'>Daftar Tempat Wisata</th></tr></table>";
            yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
          tripCost = 0;
          var isRekomendasi = getCookie("isRekomendasi").replace(/\+/gi, " ");
          for(var i=0; i<itineraryPlaceArray.length; i++)
          {
            if(itineraryPlaceArray[i]!='terhapus' && itineraryPlaceArray[i]!="")
              {
                yangDipilih  = yangDipilih + "<tr><td><a href='"+baseurl+"place/"+itineraryPlaceArray[i]+"'style=\"padding-top: 0px;\"><div class='pic-small' style='margin-top: 0px;'><img src='"+pic_thumbnail_array[i]+"' ></div></a></td><td style='color: #1c1c1c !important;'>"+itineraryPlaceArray[i]+"<br>Rp "+itineraryTotalPriceArray[i]+"<br> <!--a class='toZoom' onclick='return setMapLocationZoom(\""+itineraryPlaceArray[i]+"\")'>see location in map<a--></td><td style=\"width: 36px;height: 37px;padding-right: 0px;\"><a href=\"javascript:setMapLocationZoom('"+itineraryPlaceArray[i]+"')\"><span class='fa fa-map-marker'></span></a></td><td><a class ='removeTrip'";
                  if(isRekomendasi=="true")
                  {
                    yangDipilih = yangDipilih + "onclick='return deleteTripRec (\""+itineraryPlaceArray[i]+"\")' ><span class='fa fa-trash-o'></span></a></td></tr>";
                   
                  }
                  else
                  {
                    yangDipilih = yangDipilih + "onclick='return deleteTrip(\""+itineraryPlaceArray[i]+"\")' ><span class='fa fa-trash-o'></span></a></td></tr>";
                  }
                
                  tripCost = tripCost + parseInt(itineraryTotalPriceArray[i]);
              }

              
          }

     //       alert(getCookie("idxFirstTrip") + " " + getCookie("idxLastTrip"));
            yangDipilih = yangDipilih + "</table></div>";
            yangDipilih = yangDipilih + "<table class='table' style='color: #1c1c1c !important;'><tr><th style='font-size:16px;'>Your Trip Cost</th><th style='font-size:16px;'>Rp "+tripCost+"</th><th><a href=\""+baseurl+"trip/view\"><button class='btn btn-warning pull-right' style='margin-top: -10px;'>View Trip</button></a></th></tr></table>";
            if(isNaN(LastCounterTrip)){
               $("#theTrip").html("Trip (0)  <span class='fa fa-bus'></span>");
            }
            else{
              $("#theTrip").html("Trip ("+LastCounterTrip+")  <span class='fa fa-bus'></span>");
            }
            
   //       alert(getCookie("placeName").replace(/\+/gi, " "));
     //     alert(tripCost);
            $(".buttonAtasToggle").popover({
              html : true,
            content: function(){
              return yangDipilih; 
            }
            });
            $('.buttonAtasToggle').attr('data-content', yangDipilih);
            var popover = $('.buttonAtasToggle').data('popover');
            $('[data-toggle="popover"]').popover('hide');
          
        }
        function setCookie(cname,cvalue,exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*60*60*1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname+"="+cvalue+"; "+expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }


        function deleteTrip(place_name1)
        {
          var r = confirm("Are you sure to delete " + place_name1 + " from your itinerary?");
          if (r == true) {
                // var baseurl = 'http://localhost/JAKtrip/';
              var countTrip = parseInt(getCookie("counterTrip"));

              if(countTrip==1)
              {
                
                jQuery.ajax({
                  type: "POST",
                  data : {
                    'datanya' :  place_name1},
                  url: baseurl+"index.php/searchCtr/deleteTrip/"+ place_name1,
                  success: function(res) {
                      if (res)
                      {
                        // var baseurl = 'http://localhost/JAKtrip/';
                        var output = getCookie("placeName").replace(/\+/gi, " ");
                  
                        var halte_awal = getCookie("halteAwal");
                        var obj = jQuery.parseJSON(res);
                 
                        output = "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;' >";
                        var isWeekend = getCookie("isWeekend");
                        var ticketprice = 0;
                        for(var i = 0; i<obj.query.result.length; i++)
                        {
                          if(isWeekend == "true")
                          {
                            ticketprice = obj.query.result[i].weekend_price;    
                          }
                          else
                          {
                            ticketprice = obj.query.result[i].weekday_price;
                          }



                          output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                        
                          var pic_thumbnail_show = ""; 
                          var link_place = "place/"+obj.query.result[i].place_name;
                          if(obj.query.result[i].pic_thumbnail==null || obj.query.result[i].pic_thumbnail==""){
                            output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+"assets/img/noimg.png'></div></a></td>";
                            pic_thumbnail_show = baseurl+"assets/img/noimg.png";
                          }
                          else{
                            output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+obj.query.result[i].pic_thumbnail+"'></div></a></td>";
                            pic_thumbnail_show = baseurl+obj.query.result[i].pic_thumbnail;
                          }
                       

                          output = output + "<td height='20px' class='tuffyh3a'><a href=\""+baseurl+"place/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('"+obj.query.result[i].place_name+"')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaBusway[i]+" (harga busway) + "+obj.query.result[i].transport_price+" (harga angkot) + "+ticketprice+" (harga tiket)<br><button class='btn btn-warning' onclick=\"addTrip('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketprice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"','"+pic_thumbnail_show+"')\">ADD TO TRIP</button><br></td>";
                           
                            
                        }
                      
                        output = output+ "</table>";
                     
                        $("#blogMain").html(output);
                        $("#goingFrom").html("Halte " + halte_awal.replace(/\+/gi, " "));
                        showTheItinerary1();

                        /*---buat nampilin notif------*/
                        window.open('#successDeleteNotify', '_self');
                        setTimeout(function(){
                          window.open('#close', '_self');
                          $('[data-toggle="popover"]').popover('show');
                          }, 1500);
                        /*---end of buat nampilin notif------*/
                      }
                  }
                });
              }
              else
              {
                  jQuery.ajax({
                  type: "POST",
                  data : {
                    'datanya' :  place_name1},
                  url: baseurl+"index.php/searchCtr/deleteTrip/"+ place_name1,
                  success: function(res) {
                      if (res)
                      {
                        // var baseurl = 'http://localhost/JAKtrip/';
                        var place_name = getCookie("placeName").replace(/\+/gi, " ");
                        var idx_last_trip = getCookie("idxLastTrip");
                        var place_name_array = place_name.split("xx");
                        
                        var output = getCookie("placeName").replace(/\+/gi, " ");
                        var obj = jQuery.parseJSON(res);
                        output = "<table class='table-hover'  style='margin-bottom: 20px; margin-left: 20px;'>";
                        
                        for(var i = 0; i<obj.query.result.length; i++)
                        {
                          var ticketPrice = 0; 
                          var isWeekend = getCookie("isWeekend");

                          if(isWeekend == "true")
                          {

                            ticketPrice = obj.query.result[i].weekend_price;
                            
                          }
                          else
                          {
                            ticketPrice = obj.query.result[i].weekday_price;
                          }

                           
                          if(obj.query.sudahDipilih[i] == true)
                          {
                             output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                              var pic_thumbnail_show = ""; 
                              var link_place = "place/"+obj.query.result[i].place_name;

                              if(obj.query.result[i].pic_thumbnail==null || obj.query.result[i].pic_thumbnail==""){
                                output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+"assets/img/noimg.png'></div></a></td>";
                                 pic_thumbnail_show = baseurl+"assets/img/noimg.png";
                              }
                              else{
                                output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+obj.query.result[i].pic_thumbnail+"'></div></a></td>";
                                pic_thumbnail_show = baseurl+obj.query.result[i].pic_thumbnail;
                              }

                              output = output + "<td height='20px' class='tuffyh3a'><a href=\""+baseurl+"place/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('"+obj.query.result[i].place_name+"')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br>";
                              output = output + "<button class='btn btn-warning disabled' onclick=\"addTrip('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"','"+pic_thumbnail_show+"')\">ADD TO TRIP</button><br>";
                              output = output + "</tr>";
                          }
                          else
                          {
                               output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                                var pic_thumbnail_show = "";
                                var link_place = "place/"+obj.query.result[i].place_name;

                                if(obj.query.result[i].pic_thumbnail==null || obj.query.result[i].pic_thumbnail==""){
                                  output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+"assets/img/noimg.png'></div></a></td>";
                                  pic_thumbnail_show = baseurl+"assets/img/noimg.png";
                                }
                                else{
                                  output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+obj.query.result[i].pic_thumbnail+"'></div></a></td>";
                                   pic_thumbnail_show = baseurl+obj.query.result[i].pic_thumbnail;
                                }

                            output = output + "<td height='20px' class='tuffyh3a'><a href=\""+baseurl+"place/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('"+obj.query.result[i].place_name+"')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br>";
                              output = output + "<button class='btn btn-warning' onclick=\"addTrip('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"','"+pic_thumbnail_show+"')\">ADD TO TRIP</button><br>";
                              // <a href=\"http://localhost/JAKtrip/place/"+obj.query.result[i].place_name+"\">see details</a></td>";
                              output = output + "</tr>";
                          }
                        }
                        output = output+ "</table>";
                    
                        $("#blogMain").html(output);
                        $("#goingFrom").html(place_name_array[idx_last_trip].replace(/\+/gi, " "));
                        showTheItinerary1();

                        /*---buat nampilin notif------*/
                        window.open('#successDeleteNotify', '_self');
                        setTimeout(function(){
                          window.open('#close', '_self');
                          $('[data-toggle="popover"]').popover('show');
                          }, 1500);
                        /*---end of buat nampilin notif------*/
                      }
                    }
                  });
                }
          } 
          
          
        }

         function deleteTripRec(place_name1)
        {
          var r = confirm("Are you sure to delete " + place_name1 + " from your itinerary?");
          if (r == true) 
          {
            //--------------------start-------------------
            var countTrip = parseInt(getCookie("counterTrip"));
            if(countTrip==1)
            {

              jQuery.ajax({
                type: "POST",
                data : {
                  'datanya' :  place_name1},
                url: baseurl+"index.php/searchCtr/deleteTrip/"+ place_name1,
                success: function(res) {
                    if (res)
                    {
                      // var baseurl = 'http://localhost/JAKtrip/';
          //            alert(res);
                      var output = getCookie("placeName").replace(/\+/gi, " ");
                 //     alert(res);
                     var obj = jQuery.parseJSON(res);
               //       alert(obj.query.result[0].place_name);
                       output = "<table class='table-hover'  style='margin-bottom: 20px; margin-left: 20px;'>";
                       var isWeekend = getCookie("isWeekend");
                       var halte_awal = getCookie("halteAwal");
                       var ticketprice = 0;
                       var budget = getCookie("budget");
                       for(var i = 0; i<obj.query.result.length; i++)
                       {
                        if(isWeekend == "true")
                        {
                          ticketprice = obj.query.result[i].weekend_price;    
                        }
                        else
                        {
                          ticketprice = obj.query.result[i].weekday_price;
                        }

                        if(budget >= obj.query.harga[i])
                        {
                          output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                          var pic_thumbnail_show = "";
                          var link_place = "place/"+obj.query.result[i].place_name;

                          if(obj.query.result[i].pic_thumbnail==null || obj.query.result[i].pic_thumbnail==""){
                            output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+"assets/img/noimg.png'></div></a></td>";
                            pic_thumbnail_show = baseurl+"assets/img/noimg.png";
                          }
                          else{
                            output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+obj.query.result[i].pic_thumbnail+"'></div></a></td>";
                            pic_thumbnail_show = baseurl+obj.query.result[i].pic_thumbnail;
                          }
                       
                          output = output + "<td height='20px' class='tuffyh3a'><a href=\""+baseurl+"place/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('"+obj.query.result[i].place_name+"')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaBusway[i]+" (harga busway) + "+obj.query.result[i].transport_price+" (harga angkot) + "+ticketprice+" (harga tiket)<br><button class='btn btn-warning' onclick=\"addTripRec('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketprice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"','"+pic_thumbnail_show+"')\">ADD TO TRIP</button><br></td>";
                        }
                          
                    
                          
                      }
                   
                      output = output+ "</table>";
                   //   alert(output);

                     $("#blogMain").html(output);
                      $("#goingFrom").html("Halte " + halte_awal.replace(/\+/gi, " "));
                     $("#input_price").val(getCookie("budget"));
                     showTheItinerary1();
                     /*---buat nampilin notif------*/
                      window.open('#successDeleteNotify', '_self');
                      setTimeout(function(){
                        window.open('#close', '_self');
                        $('[data-toggle="popover"]').popover('show');
                        }, 1500);
                      /*---end of buat nampilin notif------*/
                    }
                    }
                  });
            }
            else
            {
                jQuery.ajax({
                type: "POST",
                data : {
                  'datanya' :  place_name1},
                url: baseurl+"index.php/searchCtr/deleteTrip/"+ place_name1,
                success: function(res) {
                    if (res)
                    {
           //           alert(res);
                      var place_name = getCookie("placeName").replace(/\+/gi, " ");;
                      var halte_name = getCookie("halteName");
                      var busway_price = getCookie("buswayPrice");
                      var angkot_price = getCookie("angkotPrice");
                      var ticket_price = getCookie("ticketPrice");
                      var total_price = getCookie("totalPrice");
                      var transport_info = getCookie("transportInfo");
                      var place_info = getCookie("placeInfo");
                      var budget = getCookie("budget");
                      var idx_last_trip = getCookie("idxLastTrip");
                      var total_price_array = total_price.split("xx");
                      var halte_name_array = halte_name.split("xx");
                //      alert(total_price_array.length);
                      var semuaHarga = 0;
                      var place_name_array = place_name.split("xx");
                      // var baseurl = 'http://localhost/JAKtrip/';

                    
                      var output = getCookie("placeName").replace(/\+/gi, " ");
             //         alert(semuaHarga);
                     var obj = jQuery.parseJSON(res);
               //       alert(obj.query.result[0].place_name);
                       output = "<table class='table-hover'  style='margin-bottom: 20px; margin-left: 20px;'>";
                      
                       for(var i = 0; i<obj.query.result.length; i++)
                      {
                        var ticketPrice = 0; 
                              var isWeekend = getCookie("isWeekend");
                              // alert(isWeekend);
                              if(isWeekend == "true")
                              {

                                ticketPrice = obj.query.result[i].weekend_price;
                                
                              }
                              else
                              {
                                ticketPrice = obj.query.result[i].weekday_price;
                              }
                              if(obj.query.sudahDipilih[i] != true && budget >= obj.query.harga[i])
                              {
                   
                                sudahHabis = false;
                               

                                output = output + "<tr onclick='javascript:showRating("+obj.query.result[i].place_name+")'>";
                                var pic_thumbnail_show = "";
                                var link_place = "place/"+obj.query.result[i].place_name;

                                if(obj.query.result[i].pic_thumbnail==null || obj.query.result[i].pic_thumbnail==""){
                                  output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+"assets/img/noimg.png'></div></a></td>";
                                  pic_thumbnail_show = baseurl+"assets/img/noimg.png";
                                }
                                else{
                                  output = output + "<td><a href='"+baseurl+link_place+"'><div class='pic150'><img src='"+baseurl+obj.query.result[i].pic_thumbnail+"'></div></a></td>";
                                  pic_thumbnail_show = baseurl+obj.query.result[i].pic_thumbnail;
                                }

                                output = output + "<td height='20px' class='tuffyh3a'><a href=\""+baseurl+"place/"+obj.query.result[i].place_name+"\" style='color: #1c1c1c;'>"+obj.query.result[i].place_name+"</a>&nbsp;&nbsp;&nbsp;<a href=\"javascript:setMapLocationZoom('"+obj.query.result[i].place_name+"')\"><span class='fa fa-map-marker'></span></a><br><div style='font-family:Lato; font-size:14px;'>Rp "+obj.query.harga[i]+" - "+obj.query.result[i].city+"</span><br>"+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga angkot ke tempat wisata) + "+ticketPrice+" (harga tiket)<br><button class='btn btn-warning' onclick=\"addTripRec('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+ticketPrice+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"','"+pic_thumbnail_show+"')\">ADD TO TRIP</button><br></td>";
                              output = output + "</tr>";
                              
                              }
                              else
                              {
                                
                              }
                      }
                      output = output+ "</table>";
                   //   alert(output);
                     $("#blogMain").html(output);
                      $("#goingFrom").html(place_name_array[idx_last_trip].replace(/\+/gi, " "));
                      $("#input_price").val(getCookie("budget"));
                     showTheItinerary1();
                     /*---buat nampilin notif------*/
                      window.open('#successDeleteNotify', '_self');
                      setTimeout(function(){
                        window.open('#close', '_self');
                        $('[data-toggle="popover"]').popover('show');
                        }, 1500);
                      /*---end of buat nampilin notif------*/
                    }
                    }
                  });
            }
            //---------------------end-------------------
          }
          
          
         }  
      



     
        

         

        function filterFunctionFinal(){   
    //document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;   
          var x = document.getElementById("category_select").value;
          var y = document.getElementById("location_select").value;
          var z = document.getElementById("name_select").value;
              
          jQuery.ajax({
                      type: "POST",
                      url: baseurl+"index.php/searchCont/searchwisataCatLocKey/"+x+"/"+y+"/"+z,
                      success: function(res) {
                          if (res)
                          {
                      var obj = jQuery.parseJSON(res);
                      var resultQuery = "";
                      for (var i=0 ; i<obj.query.length; i++){
                        resultQuery = resultQuery +obj.query[i].place_name+"<br>";
                      }
                      
                    $("#output_field").html(resultQuery);
      //                $("#output_field").html(obj.query[0].place_name;
        }
                    
                          }
                              }
                          );
        }

       

$(document).ready(function() {


//faq----------
        $("li#gs > a").css("color", "#db2719");
        $("li#gs > a").css("padding-bottom", "15px"); 
        $("li#gs > a").css("border-bottom", "solid 5px #db2719");

        $("#gscon").show();
        $("#aapcon").hide();
        $("#plcon").hide();
        $("#revcon").hide();
        $("#otcon").hide();

        $("#gs").click(function(){
          $("#aapcon").hide();
          $("#plcon").hide();
          $("#revcon").hide();
          $("#otcon").hide();
          $("#gscon").show();
          $("li#gs > a").css("color", "#db2719");
        $("li#gs > a").css("padding-bottom", "15px"); 
        $("li#gs > a").css("border-bottom", "solid 5px #db2719");
        });

        $("#aap").click(function(){
          $("#gscon").hide();
          $("#plcon").hide();
          $("#revcon").hide();
          $("#otcon").hide();
          $("#aapcon").show();
          $("li#aap > a").css("color", "#db2719");
        $("li#aap > a").css("padding-bottom", "15px"); 
        $("li#aap > a").css("border-bottom", "solid 5px #db2719");
        });

        $("#pl").click(function(){
          $("#gscon").hide();
          $("#aapcon").hide();
          $("#revcon").hide();
          $("#otcon").hide();
          $("#plcon").show();
        });

        $("#rev").click(function(){
          $("#gscon").hide();
          $("#plcon").hide();
          $("#aapcon").hide();
          $("#otcon").hide();
          $("#revcon").show();
        });

        $("#ot").click(function(){
          $("#gscon").hide();
          $("#plcon").hide();
          $("#revcon").hide();
          $("#aapcon").hide();
          $("#otcon").show();
        });
//---------------------------------------------------------

//------------------------PLACES-----------------------------
      $("#infocon").show();
        $("#photoscon").hide();
        $("#reviewscon").hide();

        $("#inf > a").css("color", "#db2719");
        $("#inf > a").css("padding-bottom", "15px"); 
        $("#inf > a").css("border-bottom", "solid 5px #db2719"); 

        $("#inf").click(function(){
          $("#photoscon").hide();
          $("#reviewscon").hide();
          $("#infocon").show();

          $("#inf > a").css("color", "#db2719");
          $("#inf > a").css("padding-bottom", "15px"); 
          $("#inf > a").css("border-bottom", "solid 5px #db2719"); 

          $("#pho > a").css("color", "");
          $("#pho > a").css("padding-bottom", ""); 
          $("#pho > a").css("border-bottom", ""); 

          $("#revi > a").css("color", "");
          $("#revi > a").css("padding-bottom", ""); 
          $("#revi > a").css("border-bottom", ""); 

        });

        $("#pho").click(function(){
          $("#infocon").hide();
          $("#reviewscon").hide();
          $("#photoscon").show();

          $("#inf > a").css("color", "");
          $("#inf > a").css("padding-bottom", ""); 
          $("#inf > a").css("border-bottom", ""); 

          $("#pho > a").css("color", "#db2719");
          $("#pho > a").css("padding-bottom", "15px"); 
          $("#pho > a").css("border-bottom", "solid 5px #db2719"); 

          $("#revi > a").css("color", "");
          $("#revi > a").css("padding-bottom", ""); 
          $("#revi > a").css("border-bottom", ""); 
        });

        $("#revi").click(function(){
          $("#infocon").hide();
          $("#photoscon").hide();
          $("#reviewscon").show();

          $("#inf > a").css("color", "");
          $("#inf > a").css("padding-bottom", ""); 
          $("#inf > a").css("border-bottom", ""); 

          $("#pho > a").css("color", "");
          $("#pho > a").css("padding-bottom", ""); 
          $("#pho > a").css("border-bottom", ""); 

          $("#revi > a").css("color", "#db2719");
          $("#revi > a").css("padding-bottom", "15px"); 
          $("#revi > a").css("border-bottom", "solid 5px #db2719"); 
        });

        $("#addrevform").hide();
        $("#addrevbtn").click(function(){
          if(getCookie("username")=="")
          {
            window.open('#openLogin', '_self');
          }
          else
          {
            $("#addrevform").toggle();
            $(this).text(function(i, text){
                  return text === "ADD NEW REVIEW" ? "CLOSE FORM" : "ADD NEW REVIEW";
              });
          }
         
        });
});
       
//---------------


/*---------buat notifikasi search---------------*/



/*---------end of buat notifikasi search---------------*/

/*---------------buat paging di suggestion-------------*/

  function goToPageSuggestion(page)
  {

    jQuery.ajax({
        type: "POST",
        url: baseurl+"index.php/SuggestionCtr/suggestionPhotoPage/"+page,
        success: function(res) {
            if (res)
            { 

              var resultQuery = "";

              //--------------

                resultQuery = resultQuery +  "<thead >";
                resultQuery = resultQuery + "<tr style='text-align: center;'>";
                resultQuery = resultQuery + "<tr style='text-align: center;'>";
                resultQuery = resultQuery +  "<th>Place Name</th><th>Link</th><th>Username</th><th>Status</th>";
                resultQuery = resultQuery + "</tr></thead>";      
                resultQuery = resultQuery + "<tbody id='output_field123' >";      
                
                var obj = jQuery.parseJSON(res);
                // var baseurl = 'http://localhost/JAKtrip/';
                for (var i=0 ; i<obj.query2.length; i++){
                    var link_pic = (obj.query2[i].pic).replace("./", baseurl);

                    resultQuery = resultQuery + "<tr>";
                    resultQuery = resultQuery + "<td>"+obj.query2[i].place_name+"</td>";
                    resultQuery = resultQuery + "<td><a href='"+link_pic+"' data-lightbox='"+obj.query2[i].place_name+"' data-title='"+obj.query2[i].pic_info+"'>"+obj.query2[i].pic+"</a></td>";
                    resultQuery = resultQuery + "<td>"+obj.query2[i].username+"</td>";
                    if(obj.query2[i].is_publish == 0)
                    {
                        resultQuery = resultQuery + "<td><a href='javascript:setphotopublish("+obj.query2[i].id_pic+")'>&nbsp;&nbsp;Publish?</a></td>";
                    }
                    else
                    {
                        resultQuery = resultQuery + "<td><a href='javascript:setphotounpublish("+obj.query2[i].id_pic+")'>&nbsp;&nbsp;Unpublish?</a></td>";
                    }
                  //  alert(resultQuery);
                    resultQuery = resultQuery + "</tr>";

                } 

                resultQuery = resultQuery + "</tbody>";     
                 
              //------------
              $("#tableSuggestionPhoto").html(resultQuery);
            }
        }
    });
  }
/*---------------end of buat paging di suggestion-------------*/